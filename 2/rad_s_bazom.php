
<style> table,td,th {border: 1px solid grey; height: 80px; width: 50%; background-color: lightblue;} </style>
<style> l {font-size: 30px; background-color: lightblue;} </style>

<?php

//da
function getIdUser( $username )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id, username, password_hash, email, registration_sequence, has_registered FROM dz2_users WHERE username=:username' );
    $st->execute( array( 'username' => $username ) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach($st->fetchAll() as $row)
  {
    return $row['id'];
  }
}

//da
function getMyQuacks( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id, id_user, quack, date FROM dz2_quacks WHERE id_user=:id_user ORDER BY date DESC' );
    $st->execute(array( 'id_user' => $id ));
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach( $st->fetchAll() as $row)
  {
    $user = getUsername( $id );
    ?></br><table><?php
    echo '@'.$user.' '.'at'.' '.$row['date'];
    echo '<tr>'.'<td>'.$row['quack'].'</td>'.'</tr>';
    ?></table></br><?php
  }
}

//da
function insertNewQuack( $id, $quack, $date )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'INSERT INTO dz2_quacks (id_user, quack, date) VALUES (:id_user, :quack, :date)' );
    $st->execute( array( 'id_user' => $id, 'quack' => $quack, 'date' => $date) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

}

//-------------------------------------------------------------------------------------------------------------
//ne
function deleteFollowingUser( $id1, $id2 )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'DELETE FROM dz2_follows WHERE id_user=:id_user AND id_followed_user=:id_followed_user' );
    $st->execute( array('id_user' => $id1, 'id_followed_user' => $id2) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
}

//da
function insertFollowingUser( $id1, $id2 )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'INSERT INTO dz2_follows (id_user, id_followed_user) VALUES (:id_user, :id_followed_user)' );
    $st->execute( array( 'id_user' => $id1,'id_followed_user' => $id2) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
}

//da
function getIdOfFollowing( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id_user, id_followed_user FROM dz2_follows WHERE id_user=:id_user' );
    $st->execute( array( 'id_user' => $id) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  $arr = array();
  while( $row = $st->fetch() )
  {
    $arr[] =  $row['id_followed_user'];
  }
  return $arr;
}

//da
function getAllQuacksOfFollowing( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id, id_user, quack, date FROM dz2_quacks WHERE id_user=:id_user ORDER BY date DESC'  );
    $st->execute(array( 'id_user' => $id ));
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach( $st->fetchAll() as $row)
  {
    $user = getUsername( $row['id_user'] );
    ?></br><table><?php
    echo '@'.$user.' '.'at'.' '.$row['date'];
    echo '<tr>'.'<td>'.$row['quack'].'</td>'.'</tr>';
    ?></table></br><?php
  }
}

function getQuacksOfFollowed( $id )
{
  try
  {
  $db = DB::getConnection();
  $st = $db->prepare( 'SELECT dz2_quacks.id, username, quack, date
                      FROM dz2_quacks, dz2_users, dz2_follows
                      WHERE dz2_follows.id_user=:id
                      AND dz2_follows.id_followed_user=dz2_users.id
                      AND dz2_follows.id_followed_user=dz2_quacks.id_user
                      ORDER BY date DESC');
  $st->execute(array( 'id' => $id ));
  }
 catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

 foreach( $st->fetchAll() as $row)
 {
   //$user = getUsername( $row['id_user'] );
   ?></br><table><?php
   echo '@'.$row['username'].' '.'at'.' '.$row['date'];
   echo '<tr>'.'<td>'.$row['quack'].'</td>'.'</tr>';
   ?></table></br><?php
 }
}

//------------------------------------------------------------------------------------------------------------------------

//da
function getIdOfFollowers( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id_user, id_followed_user FROM dz2_follows WHERE id_followed_user=:id_followed_user' );
    $st->execute( array( 'id_followed_user' => $id) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  $arr = array();
  while( $row = $st->fetch() )
  {
    $arr[] =  $row['id_user'];
  }
  return $arr;
}

//da
function getUsernameOfFollowers( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id, username FROM dz2_users WHERE id=:id' );
    $st->execute(array( 'id' => $id ));
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach( $st->fetchAll() as $row)
  {
    ?><table><?php
    echo '<l>'. $row['username'].'</l>';
    ?></table><?php
  }
}

//--------------------------------------------------------------------------------------------------------------------------

//da
function getUsername( $id )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT id, username FROM dz2_users WHERE id=:id' );
    $st->execute(array( 'id' => $id ) );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach($st->fetchAll() as $row)
  {
    return $row['username'];
  }
}

//da
function getAllQuacksWithUsername( $username )
{
  try
  {
    $db = DB::getConnection();
    $st = $db->prepare( 'SELECT * FROM dz2_quacks ORDER BY date DESC');
    $st->execute( );
  }
  catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

  foreach( $st->fetchAll() as $row)
  {
    $string = $row['quack'];

    $word = explode(' ',$string);
    $words = preg_replace("/[^A-Za-z]/",'', $word);
    $size = sizeof($words);

    for( $i = 0; $i < $size; $i++)
    {
      if( strcmp($words[$i], $username) === 0 )
      {
        $user = getUsername( $row['id_user'] );
        ?><table><?php
        echo '@'.$user.' '.'at'.' '.$row['date'];
        echo '<tr>'.'<td>'.$row['quack'].'</td>'.'</tr>';
        ?> </table></br><?php
      }
    }
  }
}

 //-------------------------------------------------------------------------------------------------------------------------

//da
 function getAllQuacksWithHashtag( $hashtag )
 {
   try
   {
     $db = DB::getConnection();
     $st = $db->prepare( 'SELECT * FROM dz2_quacks ORDER BY date DESC');
     $st->execute( );
   }
   catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

   $bool = 0;
   foreach( $st->fetchAll() as $row)
   {
     $string = $row['quack'];

     $word = explode(' ',$string);
     $words = preg_replace("/[^A-Za-z]/",'', $word);
     $size = sizeof($words);

     for( $i = 0; $i < $size; $i++)
     {
       if( strcmp($words[$i], $hashtag) === 0 )
       {
         $user = getUsername( $row['id_user'] );
         ?><table><?php
         echo '@'.$user.' '.'at'.' '.$row['date'];
         echo '<tr>'.'<td>'.$row['quack'].'</td>'.'</tr>';
         ?> </table></br><?php
         $bool = 1;
       }
     }
   }
   return $bool;
 }

?>
