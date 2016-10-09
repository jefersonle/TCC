<html>
<head>
<script type="text/javascript" src="{{ url('/jquery.min.js') }}"></script>
<script type="text/javascript">
	$.ajax({
		url: "{{ url('/usuario') }}",
		data: '',
		name:name,
		method:'get',
		success:function(data){
		  console.log(data);}
		});
</script>

</head>

<body>
</body>
</html>