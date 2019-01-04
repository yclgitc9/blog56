@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
@endsection

@section('script')
    <script src="/backend/plugins/tag-editor/jquery.caret.min.js"></script>
    <script src="/backend/plugins/tag-editor/jquery.tag-editor.min.js"></script>
    <script type="text/javascript">
        var options = {};

        @if ($post->exists)
            options = {
                initialTags: {!! $post->tags_list !!}
            };
        @endif

        $('input[name=post_tags]').tagEditor(options);

        $('ul.pagination').addClass('no-margin pagination-sm');

        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                  .replace(/[^a-z0-9-]+/g, '-')
                                  .replace(/\-\-+/g, '-')
                                  .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });

        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $('#datetimepicker1').on("dp.change",function (e) {
            console.log(e);
        });

        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
    </script>
@endsection
