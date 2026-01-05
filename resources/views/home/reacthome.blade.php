@extends('layouts.cgen')

@section('stylesheet')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/home.less') }}" />
@endsection

@section('content')
  @viteReactRefresh
    @vite('resources/js/main.jsx')
 <div id="main"></div>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('/assets/js/video-modal.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".styled-select").each(function() {
                var _this = $(this);
                var select2Conf = {
                    minimumResultsForSearch: Infinity
                };
                if (_this.attr('data-selectionCssClass')) {
                    select2Conf.selectionCssClass = _this.attr('data-selectionCssClass');
                }
                if (_this.attr('data-dropdownCssClass')) {
                    select2Conf.dropdownCssClass = _this.attr('data-dropdownCssClass');
                }
                _this.select2(select2Conf);
            });
        });
    </script>
@endsection
