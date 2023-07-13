<?php
class Node{
    public $head=null;
}
class linkedlist{
    public $next;
    public $value;
    public function __construct($val){
        $this->next=null;
        $this->value=$val;
    }
}
$i=1;
function add($val){
    $index=(int) $GLOBALS["i"]++;
    $cn="cn".$index;
    $bn="cn".$index-1;
    global $$cn;
    global $$bn;
    $$cn=new linkedlist($val);
    if($index>1){
        $GLOBALS[$bn]->next=$$cn;
    }
    return $$cn;
}
function mid_add($bef,$val){
    // echo "<pre>";
    // var_dump($GLOBALS[$bef])."<br>";
    // var_dump();
    global $object;
    $object=new linkedlist($val);
    $object->next=$GLOBALS[$bef]->next;
    $GLOBALS[$bef]->next=$object;
    return $object;
}
class unitTest extends PHPUnit\Framework\TestCase {
    function testcase(){
        $mylist=new node();
        $cn1=add("0");
        $cn2=add("2");
        $mylist->head=$cn1;
        $mylist=[];
        for($i=0;$i<260000;$i++){
            array_unshift($mylist,"1");
            mid_add("cn1","1");
        }
        $this->assertSame(1,1);
        // var_dump($mylist);
    }
}
echo "<pre>";
$test=new unitTest;
$test->testcase();