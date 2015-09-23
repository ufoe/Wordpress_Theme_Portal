//Tabs
var $j = jQuery.noConflict();
$j(function(){
    var $jtitle = $j(".wpyounavi span");
    var $jcontent = $j(".wpyoufunction");
    $jtitle.mousedown(function(){
        var index = $jtitle.index($j(this));
		$j(this).addClass("mouseover").siblings().removeClass("mouseover");
        $jcontent.hide();
        $j($jcontent.get(index)).show();
        return false;
    });
});