@extends('layouts.app')

@section('content')

    <div class="top-container">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 a-left">
                        @if ($cocogen_admin_breadcrumbs)
                            <ul>
                                <?php for ($i = 0; $i < count($cocogen_admin_breadcrumbs); $i++) {?>
                                @if ($i + 1 === count($cocogen_admin_breadcrumbs))
                                    @if ($cocogen_admin_breadcrumbs[$i]['links'])
                                        <li class="home"><a href="{{ url('') }}{{ $cocogen_admin_breadcrumbs[$i]['links'] }}"> {{ $cocogen_admin_breadcrumbs[$i]['name'] }}</a></li>
                                    @else
                                        <li class="category4"><span> {{ $cocogen_admin_breadcrumbs[$i]['name'] }} </span> </li>
                                    @endif
                                @else
                                    @if ($cocogen_admin_breadcrumbs[$i]['links'])
                                        <li class="home"><a href="{{ url('') }}{{ $cocogen_admin_breadcrumbs[$i]['links'] }}"> {{ $cocogen_admin_breadcrumbs[$i]['name'] }}</a><span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                    @else
                                        <li class="category4"><span> {{ $cocogen_admin_breadcrumbs[$i]['name'] }} </span> <span class="breadcrumbs-split"><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                                    @endif
                                @endif
                                <?php } ?>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <?php $newDateFormat2 = date('F d, Y', strtotime($cocogen_admin_pages_blogs[0]['created_at'])); ?>
        </div>
        <div class="col-sm-12" style="margin-top: 50px;font-family: muli;margin-bottom: 30px">
            <span style="font-size:30px;color:#00539e;"><b>{{ $cocogen_admin_pages_news[0]['name'] }}</b></span>
        </div>
        <!--
            <div style="font-family: muli">
                <span style="font-size:12px;opacity: 0.9;">created by: <b>{{ $cocogen_admin_pages_news[0]['writtenBy'] }}</b></span>
            </div> -->

        <div style="margin-top: 50px; ">
            <img src="{{ asset($cocogen_admin_pages_blogs[0]['location']) }}" class="img-reponsive">
        </div>
        <div>
            <div class="blogsmargin" style="font-family: muli; text-align: justify;text-justify: inter-word;">
                <?php echo $cocogen_admin_pages[0]['content']; ?>
            </div>
        </div>
        <div style="margin-top: 0px;font-family: muli"><br>

        </div>
    </div>

    <a href="#" id="totop" style="display: none;"><i class="fa fa-chevron-up"></i></a>


    <style type="text/css">
        @media all and (min-width:801px) {


            div.blogsmargin {
                margin-left: 450px !important;
                margin-right: 450px !important;
                margin-top: 10px !important;
                margin-bottom: 450px !important;
            }

        }

    </style>

@endsection
