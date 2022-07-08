 <!-- footer div starts here -->
   <div class="container footer-wrap footerContent">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-6 footer-left pull-left">
                    <p style="color:#b9b9b9;">&copy; All Right Reserved</p> 
                </div>
                <div class="col-sm-6 text-right footer-right pull-right">
                    <p style="color:#b9b9b9;">Powered by <a href="<?=ROOT?>" style="text-decoration:none; color:#337ab7"><?=Developer?></a></p>     
                </div>
            </div>
        </div>
    </div>
<!-- footer div ends here -->
<script src="<?=ASSETS?>js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?=ASSETS?>js/DataValidation.js"></script>
<script src="<?=ASSETS?>js/mask.js" type="text/javascript"></script>
<script>
$(function() {
    $('.tooltip').tooltip();	
    $('.tooltip-left').tooltip({ placement: 'left' });	
    $('.tooltip-right').tooltip({ placement: 'right' });	
    $('.tooltip-top').tooltip({ placement: 'top' });	
    $('.tooltip-bottom').tooltip({ placement: 'bottom' });
    $('.popover-left').popover({placement: 'left', trigger: 'hover'});
    $('.popover-right').popover({placement: 'right', trigger: 'hover'});
    $('.popover-top').popover({placement: 'top', trigger: 'hover'});
    $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
    $('.notification').click(function() {
        var $id = $(this).attr('id');
        switch($id) {
            case 'notification-sticky':
                $.jGrowl("Stick this!", { sticky: true });
            break;
            case 'notification-header':
                $.jGrowl("A message with a header", { header: 'Important' });
            break;
            default:
                $.jGrowl("Hello world!");
            break;
        }
    });
});
</script>
</body>
</html>