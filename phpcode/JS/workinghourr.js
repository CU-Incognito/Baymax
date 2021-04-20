onSelect = () => {
	var element = event.target;
	var s_id = element.value;
	var id = element.id;
	var index = id.indexOf("#");
	var d_id = id.substring(0,index);
	var day = id.substring(index+1, id.length);
	//alert(day);
	var url = "workinghour.php?d_id=" + d_id + "&day=" + day +  "&s_id=" + s_id;
	window.location.href = url;
}
