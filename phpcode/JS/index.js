onSelect = () => {

	var element = event.target;
	var id = element.id;
	var day = element.value;
	var url = "workinghour.php?d_id=" + id + "&day=" + day;
	window.location.href = url;
}