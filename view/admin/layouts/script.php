<script src="<?= asset('public/admin/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= asset('public/admin/js/popper.js') ?>"></script>
<script src="<?= asset('public/admin/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/admin/js/custom.js') ?>"></script>
<script src="<?= asset('public/admin/plugins/select2/js/select2.min.js')  ?>"></script>
<script src="<?= asset('public/general/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= asset('public/admin/jalalidatepicker/persian-date.min.js') ?>"></script>
<script src="<?= asset('public/admin/jalalidatepicker/persian-datepicker.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = null;
        if (tags_input.val() !== null && tags_input.val().length > 0) {
            default_data = default_tags.split(',');
        }
        select_tags.select2({
            placeholder: 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data
        });
        select_tags.children('option').attr('selected', true).trigger('change');
        $('#form').submit(function(event) {
            if (select_tags.val() !== null && select_tags.val().length > 0) {
                var selectedSource = select_tags.val().join(',');
                tags_input.val(selectedSource)
            }
        })
    })
</script>
<script>
    CKEDITOR.replace('body');
</script>
<script>
    $(document).ready(function() {
        $('#published_at_view').persianDatepicker({
            format: 'YYYY/MM/DD HH:mm:ss',
            altField: '#published_at',
            observer:true,
            toolbox: {
                calenderSwitch: {
                    enabeled: true,
                },
            },
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }
        })
    });
</script>