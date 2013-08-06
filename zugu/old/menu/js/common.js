
function get_positive(val){
    if(val<0){
        return (-val);
    }
    else
        return val;
}



function check_is_me_resident(arr, name) {
    var found = false;
    for (var v = 0;v<arr.length;v++) {
        if (arr[v] == name) {
            found = true;
            break;
        }
        else
            found=false;
    }
    return found;
}
function remove_suffix(str,suffex)
{
    pf_arr=str.split(suffex);
    return pf_arr[0];
}

function is_within_range(p,x1,x2,y1,y2){
    //
    if(p.pageX>x1 && p.pageX<x2 && p.pageY>y1 && p.pageY<y2)
        return true;
    else return false;
}
function is_active(e,obj)
{
    var start_x=$(obj).offset().left;
    var start_y=$(obj).offset().top;
    var stop_x=$(obj).offset().left+parseInt(remove_suffix($(obj).css("width"),"px"));
    var stop_y=$(obj).offset().top+parseInt(remove_suffix($(obj).css("height"),"px"));
    //alert(10+parseInt(remove_suffix($(obj).css("top"),"px")));
    if(is_within_range(e,start_x,stop_x,start_y,stop_y))
        res= true;
    else
        res= false;
    return res;

}
function ceiling(flt)
{
    count=""+flt;
    ceil_val=count.split(".");
    return parseInt(ceil_val[0]);
}

function get_count(obj)
{
    i=0;
    $(obj).each(function(){
        i++;
    })
    return i;
}
