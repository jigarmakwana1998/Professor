<?php
require_once './login/session.php';
$log = checkuser();
if (!$log) {
    header('Location: login/index.php');
}

?>

<style>
    * {
        padding: 0;
        margin: 0;
    }

    .login_info {
        width: 100%;
        height: 30px;
        background-color: rgb(50, 50, 50);
        color: white;
        text-align: center;
        line-height: 30px;
    }

    .logout_button {
        padding: 2px 5px;
        border-radius: 5px;
        background-color: rgb(227, 15, 41);
    }

    .logout_button:hover {
        cursor: pointer;
    }
</style>
<div class="login_info">
    you are logged in as <?php echo ($_SESSION['user_name']) ?>
    <span class="logout_button" onclick="(function(){window.location.href = './login/logout.php'})()"> Logout </span>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .project {
            border: 1px solid black;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <h1>Projects</h1>
    <button id="fetch">Fetch</button>
    <div id="projects">
    </div>


</body>
<script src="./jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // get all the project

    $("#fetch").click(function() {
        GetProject();
    });

    function GetProject() {
        $.post("api/projects/fetch.php", {
            edit: false,
            delete: false,
            data: "All"
        }, function(result) {
            DisplayProject(result);
        });
    }

    let project;

    function DisplayProject(obj) {
        project = JSON.parse(obj);
        let displayElement = '';
        for (let i = 0; i < project.length; i++) {
            displayElement += `<div class='project' id='pro` + i + `'>
                <p>id: ` + project[i].id + `</p>
                <p>title: ` + project[i].title + `</p>
                <p>place: ` + project[i].place + `</p>
                <p>role: ` + project[i].role + `</p>
                <p>duration: ` + project[i].duration + `</p>
                <p>date_start: ` + project[i].date_start + `</p>
                <p>date_end: ` + project[i].date_end + `</p>
                <p>sponser: ` + project[i].sponser + `</p>

                <button onclick="editStart( 'pro` + i + `' , ` + i + ` )">Edit</button>
                <button onClick="deleteProject(` + project[i].id + `, ` + i + ` )">Delete</button>
            </div>`;
        }
        $('#projects').html(displayElement);
    }


    function editStart(id, i) {
        id = "#" + id;
        let displayForm = `<form action="api/projects/update.php"  method="post" enctype="multipart/form-data">
        <input type="text" value="` + project[i].title + `" name="title" /><br>
        <input type="text" value="` + project[i].place + `" name="place" /><br>
        <input type="text" value="` + project[i].role + `" name="role" /><br>
        <input type="text" value="` + project[i].duration + `" name="duration" /><br>
        <input type="date" name="sdate" value="` + project[i].date_start + `" /><br>
        <input type="date" name="edate" value="` + project[i].date_end + `" /><br>
        <input type="text" name="sponser" value="` + project[i].sponser + `" /><br>

        <input type="number" name="id" value="` + project[i].id + `" hidden /><br>
        <input type="submit" value="save" />
        </form> `;
        let ele = $(id);
        ele.after(displayForm);
    }

    function deleteProject(id, i) {
        $.post("api/projects/delete.php", {
            delete: true,
            id: id
        }, function(result) {
            if (result === "Success") {
                // delete the element with id artid
                let id = "#pro" + i;
                $(id).css("display", "none");
            }
        });
    }
</script>

</html>