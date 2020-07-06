<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="app">
    <div id="app1">
        <form id="app1_form">
            <input type="text" name="test1">
        </form>
    </div>

    <div id="app2">
        <form id="app2_form">
            <input type="file" name="test2">
        </form>
    </div>

    <div>
        <template id="app3">
            <form id="app3_form">
                <input type="text" name="title">
            </form>
        </template>
    </div>

    <button id="submit">提交测试数据</button>
</div>

</body>

<script src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>

<script>
    $(document).ready(function(){
        $("#submit").on("click", function () {
            var form1 = $("#app1_form").serialize();

            var form2 = $("#app2_form").serialize();

            var form3 = $("#app3_form").serialize();

            console.log(form1);

            console.log(form2);
            console.log(form3);

            var test = $("#app3").html();

            console.log(test);
        })
    });
</script>
</html>
