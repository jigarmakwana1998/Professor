<h1>Awards</h1>
<form action="api/awards/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Projects</h1>
<form action="api/projects/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Place" name="place" /><br>
    <input type="text" placeholder="Role" name="role" /><br>
    <input type="text" placeholder="Duration" name="duration" /><br>
    <input type="date" name="sdate" /><br>
    <input type="date" name="edate" /><br>
    <input type="text" placeholder="sponser" name="sponser" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Publications</h1>
<form action="api/publications/new.php" method="post">
    <select name="type">
        <option value="article">Article</option>
        <option value="book">Book</option>
        <option value="conference">Conference</option>
        <option value="journal">Journal</option>
        <option value="news">News</option>
    </select><br>
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="text" placeholder="Authors" name="authors" /><br>
    <input type="text" placeholder="Place" name="place" /><br>
    <input type="date" placeholder="Date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Students</h1>
<form action="api/students/new.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Name" name="name" /><br>
    <select name="degree">
        <option value="mtech">MTech</option>
        <option value="phd">PhD</option>
        <option value="post">Post Doctorate</option>
    </select><br>
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="text" placeholder="Designation" name="designation" /><br>
    <input type="file" placeholder="Image" name="avatarlocation" /><br>
    <input type="submit" value="Create" />
</form>