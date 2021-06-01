<?php

function deployView($arrElement=[], $data=[]){
  if (count($arrElement)>1) {

    for ($i=0; $i < count($arrElement); $i++) {
      $separated_url = explode("/",$arrElement[$i]);
      echo count($separated_url)>1 ? view($arrElement[$i]) : view('template/'.$arrElement[$i]);
    }

  }else{
    echo view('template/header');
    echo view('template/bar_top');
    echo view('template/bar_side');
    echo view($arrElement[0]);
    echo view('template/footer');
    echo view('template/js_handler');
  }
}

?>
