<?php

# Sert a rien juste pour exemple demandé par Olivier 

  $_POST['search'] = 'Sony';
  foreach($_POST as $key => $value){

    if($key === 'search'){
        $getUrl = $key.'='.$value;
    }
    
  }

if($_POST['filter'] === 'users'){

  header('Location: userList.php?'. $getUrl);

}elseif($_POST['filter'] === 'cards'){

  header('Location: cardList.php?'. $getUrl);

}elseif($_POST['filter'] === 'boards'){
  
  header('Location: cardList.php?'. $getUrl);
}elseif($_POST['filter'] === 'all'){

  header('Location: searchResult.php?'. $getUrl);
}

  
  header('Location: userList.php?search=Sony');