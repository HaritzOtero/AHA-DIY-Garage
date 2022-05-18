<!-- Head -->
<?php
$TITLE = "Message";
$CSS_PATH = "./message.css";
include_once("../../../includes/head/head.php");
?>

<body>
    <!-- Navigation bar -->
    <?php
    session_start();
    $name = $_SESSION['name'];
    $userID = $_SESSION['userID'];
    $position = $_SESSION['position'];
    $session = $_SESSION['session'];
    include("../../../module/connection.php");
    include("../../../includes/navigation/navigation-bar.php");
    $link = KonektatuDatuBasera();
    ?>
    <div style="width:1500px;margin:auto">

    
    <H1>Client Messages</H1>
    <?php

    $emaitza = mysqli_query($link, "select * from message");

    ?>

    <table border='1' id="table1">
        <tr>
            <Th>Client information</Th>
            <Th>Message</Th>
        </tr>
        <?php
        while ($erregistroa = mysqli_fetch_array($emaitza)) {
            printf("
                        

		<tr>
					<td>
                        <table>
                        <tr>
                                <td> %s </td>
                            </tr>
                            <tr>
                                <td> %s </td>
                            </tr>
                            <tr>
                                <td> %d </td>
                            </tr>
                        </table>
                    </td>
			        <td> <div style='word-wrap: break-word:'></div>%s </td>
        </tr>
        	
", $erregistroa["name"], $erregistroa["email_address"], $erregistroa["phone_number"], $erregistroa["message"]);
        }
        ?>
    </table>
    </div>
</body>

</html>