<?php
class Node{
    public $data;
    public $next;
}
$head=null;
$last=$head;
function insert($val){
    $new_node=new node();
    $new_node->data=$val;
    if ($GLOBALS["head"]==null){
        global $head;
        $head=$new_node;
        $new_node->next=null;
        global $last;
        $last=$head;
    }
    else{
        global $last;
        $last=$GLOBALS["last"];
        while(@$last->next!=null){
            $last=$last->next;
        }
        $last->next=$new_node;
        $new_node->next=null;
    }
}
function mid_insert($bef,$val){
    $ptr=$GLOBALS["head"];
    $new_node=new node();
    $new_node->data=$val;
    if($GLOBALS["head"]==null){
        global $head;
        $head=$new_node;
        $new_node->next=null;
    }
    else{
        while($ptr->data!=$bef and $ptr->next!=null){
            $ptr=$ptr->next;
        }
        if($ptr->data!=$bef){
            echo "not in linked list<br>";
        }
        else{
            $new_node->next=$ptr->next;
            $ptr->next=$new_node;
        }
    }
}
function display(){
    if($GLOBALS["head"] == null){
        echo "linked list is empty";
    }
    else{
        $current_node=$GLOBALS["head"];
        while($current_node!=null){
            echo $current_node->data."<br>";
            $current_node=$current_node->next;
        }
    }
}
function deleteNode($value){
    $current=$GLOBALS["head"];
    $previous=$GLOBALS["head"];
    if ($current->data==$value){
        global $head;
        $head=$current->next;
        unset($current);
        return;
    }
    while($current->data!=$value){
        $previous=$current;
        $current=$current->next;
    }
        // echo "done";
    $previous->next=$current->next;
    unset($current);

} 
function delete_beg(){
    if ($GLOBALS["head"]==null){
        echo "empty<br>";
    }
    else{
        $first_node=$GLOBALS["head"];
        $GLOBALS["head"]=$first_node->next;
        unset($first_node);
    }
}
function delete_end(){
    if ($GLOBALS["head"]==null){
        echo "empty<br>";
    }
    elseif($GLOBALS["head"]->next==null){
        unset($GLOBALS["head"]);
        global $head;
        $head=null;
    }
    else{
        $ptr=$GLOBALS["head"];
        while($ptr->next->next!=null){
            $ptr=$ptr->next;
        }
        unset($ptr->next);
        $ptr->next=null;
    }
}
function insert_beg($value){
    $new_node=new node;
    $new_node->data=$value;
    $new_node->next=$GLOBALS["head"];
    global $head;
    $head=$new_node;
}
class unitTest extends PHPUnit\Framework\TestCase {
    function testcase(){
        // insert("odd");

        // insert("end",0);
        // insert("7",2);
        // $mylist=[];
        for($i=0;$i<2600000;$i++){
            // array_unshift($mylist,"1");
            // $mylist[]="1";
            insert("1");
        }
        // insert_beg("1");
        // insert_beg("first");
        // delete_beg();
        // deleteNode("odd");
        // mid_insert("1","2");
        // insert("3");
        // insert("4");
        // insert("5");

        // insert("end",0);
        // delete_end();
        // mid_insert("5","6");
        // display();
        $this->assertSame(1,1);
        // var_dump($mylist);
    }
}
// echo "<pre>";
// $test=new unitTest;
// $test->testcase();
// var_dump($head);