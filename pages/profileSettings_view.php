<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        include_once('../loginfirst.php');
        exit();
    }
    else
    {
        include('../_header.php');
        include('../controller/profileSettings.php');
?>

<div class='container profileSettingsContainer'>
    <div class='row'>
        <div class='col-lg-12'>
            <h3 class='subtitle'><u>Account Settings</u></h3>
        </div>
    </div>
    <div id='contents' style='margin: 1rem;'>
        <div class='settingsOptionContainer row h-100'>
            <div class='col-lg-2' class='h-100'>
                <div id='settingsOption'>
                    <button class='btn btn-link' onclick='javascript:OptionProfile("SHOW", 0)'><b>Basic Details</b></button>
                    <button class='btn btn-link' onclick='javascript:OptionProfile("SHOW", 1)'><b>Family Background</b></button>
                    <button class='btn btn-link' onclick='javascript:OptionProfile("SHOW", 2)'><b>Educational Background</b></button>
                    <button class='btn btn-link' onclick='javascript:OptionProfile("SHOW", 3)'><b>Privacy</b></button>
                </div>
            </div>
            <div class='col-lg-10 h-100'>
                <div id='contents-info' class='w-100 h-100'></div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    function editEnable()
    {
        $(".btn-save").prop("disabled", false);
        $("input").addClass("edit");
        $("input").prop("disabled", false);
        $(".dateDisplay").css("display", "none");
        $(".dateEdit").css("display", "block");
    }
</script>
<script type='text/javascript'>
    function OptionProfile(act, type)
    {
        $('#contents-info').html('');
        var url = "../controller/profileSettingsProcess.php";

        switch (type)
        {
            case 0: // Basic
                $.post (
                    url,
                    {
                        empId: '<?= $empID; ?>',
                        option: 0,
                        action: act
                    },
                    function(data) { $("#contents-info").html(data).show(); }
                );
                break;
            case 1: // Family
                $.post (
                    url,
                    {
                        empId: '<?= $empID; ?>',
                        option: 1,
                        action: act
                    },
                    function(data) { $("#contents-info").html(data).show(); }
                );
                break;
            case 2: // Education
                $.post (
                    url,
                    {
                        empId: '<?= $empID; ?>',
                        option: 2,
                        action: act
                    },
                    function(data) { $("#contents-info").html(data).show(); }
                );
                break;
            case 3: // Privacy
                $.post (
                    url,
                    {
                        empId: '<?= $empID; ?>',
                        option: 3,
                        action: act
                    },
                    function(data) { $("#contents-info").html(data).show(); }
                );
                break;
            default:
                break;
        }
    }
</script>

<?php include('../_footer.php'); } ?>