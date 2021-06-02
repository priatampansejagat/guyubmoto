<?php

function deployView($arrElement=[], $data=[]){
  if (count($arrElement)>1) {

    for ($i=0; $i < count($arrElement); $i++) {
      $separated_url = explode("/",$arrElement[$i]);
      echo count($separated_url)>1 ? view($arrElement[$i],$data) : view('template/'.$arrElement[$i],$data);
    }

  }else{
    echo view('template/header',$data);
    echo view('template/bar_top',$data);
    echo view('template/bar_side',$data);
    echo view($arrElement[0],$data);
    echo view('template/footer',$data);
    echo view('template/js_handler',$data);
  }
}

?>
