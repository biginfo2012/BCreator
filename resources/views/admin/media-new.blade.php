<x-admin-layout>
    <div class="side-app dash_min-hei" id="media-new">
        <div class="page-header">
            <h4 class="page-title">新規追加：メディア</h4>
        </div>
        <form id="media">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">アップロード <span class="form-label-small">最大1,000MB</span></label>
                        <input type="file" class="dropify" data-height="150" name="file" required/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class>
                        <button type="submit" class="btn btn-primary btn_submit">新規アップロード</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                saveForm('media', save_media)
            })
        })
    </script>
</x-admin-layout>
