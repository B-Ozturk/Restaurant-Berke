<?php
include_once("./adminStructure.php");
?>

<html>
<div class="container">
    <h3 class="text-center">Welkom
        <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?>
    </h3>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis, ante quis lacinia eleifend,
        odio lacus dignissim purus, luctus finibus arcu elit eget orci. Ut quis vestibulum leo. Nullam
        quis sem lectus. Fusce finibus sit amet metus nec venenatis. Maecenas at volutpat tortor, at
        sollicitudin neque. Nunc elementum in dolor at pulvinar. Donec eget vulputate nunc, sit amet
        tincidunt ligula. Vestibulum hendrerit consequat leo. Morbi mi ligula, pulvinar at nisl in,
        efficitur ullamcorper quam. Donec ullamcorper purus neque, quis feugiat orci laoreet a. Sed
        sollicitudin vehicula interdum. Integer consectetur tortor ipsum, eget tempor velit varius bibendum.
        Sed feugiat eros metus, ultricies accumsan nisi pharetra sed. Nam auctor venenatis augue quis dignissim.

        In ac ligula faucibus, laoreet ante ac, laoreet lectus. Quisque nisl tellus, tincidunt vel sodales
        vel, blandit eu nunc. Nullam faucibus justo leo. Fusce mattis finibus nulla. In mauris lacus, volutpat
        porttitor leo accumsan, interdum mollis ipsum. Quisque ac ipsum libero. Nullam ornare, nisl a
        fringilla ornare, purus arcu porta elit, in fermentum sapien nunc eu massa. Morbi vitae fringilla nisi.
    </p>
</div>
</html>