@extends('layouts.epartner')
@section('main-content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="title">Presentation</p>
                        </div>
                        <div  class="col-lg-3 text-end">
                            <button class="epolicy-button epolicy-button-success" onclick="window.location.href='{{route('partner-training')}}'"  id="presentation">Back</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3">
                                    <label for="line">Category</label>
                                    <select id="line" name="line"  class="form-control selectpicker input-lg" data-style="input-lg btn-topic" data-size="10" data-live-search="true" >
                                                <option value="">Category*</option>
                                                <option value="Aviation">Aviation</option>
                                                <option value="Casualty">Casualty</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Fire">Fire</option>
                                                <option value="Lialibility">Lialibility</option>
                                                <option value="Motor Car">Motor Car</option>
                                                <option value="Marine Hull">Marine Hull</option>
                                                <option value="Marine Cargo">Marine Cargo</option>
                                                <option value="Personal Accident">Personal Accident</option>
                                                <option value="Bonds">Bonds</option>
                                                <option value="Engage Webinar">Engage Webinar</option>
                                    </select>
                            </div>

                            <div class="col-md-3 ">
                                    <div id="search_div">
                                        <label for="search_producer">Search</label>
                                        <input type="text" class="form-control input-lg" id="search_producer">
                                    </div>
                            </div>
                            <div class="col-md-2 offset-md-4">  
                                <div id="view_div" style="margin-top:20px">
                                        <a href="#" class="btn btn-primary"  id="gridView">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="text-align: center;margin-left: 10px;" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 4h6v6h-6z"></path><path d="M14 4h6v6h-6z"></path><path d="M4 14h6v6h-6z"></path><path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path></svg>
                                        </a>
                                        <a href="#" class="btn btn-teal"  id="listView">
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24" style="text-align: center;margin-left: 10px;"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-baseline-density-medium"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h16" /><path d="M4 12h16" /><path d="M4 4h16" /></svg>
                                        </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="drive-wrapper drive-grid-view">
                            <div class="grid-items-wrapper" id="producer-files">
                            </div>
                        </div>
                        <div style="padding: 15px;" id="pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
        <style type="text/css">
                .title {
                    font-size: 25px;
                    font-weight: 700;
                    margin: 0;
                }
                .epolicy-button {
                    padding: 14px 16px;
                    border-radius: 12px;
                    border: none;
                    color: white;
                }

                .epolicy-button-success {
                    background: #008080 !important;
                }
                .btn-topic,
                .btn-product,
                .btn-branch,
                .btn-white{
                    background-color: #ffffff;
                    border-color: #808080;
                    margin-bottom: 15px !important;
                }

            .view-account{
                        background:#FFFFFF;
                        margin-top:20px;
                    }
                    .view-account .pro-label {
                        font-size: 13px;
                        padding: 4px 5px;
                        position: relative;
                        top: -5px;
                        margin-left: 10px;
                        display: inline-block
                    }

                    .col-main {
                        padding-bottom: 0px !important;
                    }

                    .view-account .side-bar {
                        padding-bottom: 30px
                    }

                    .view-account .side-bar .user-info {
                        text-align: center;
                        margin-bottom: 15px;
                        padding: 30px;
                        color: #616670;
                        border-bottom: 1px solid #f3f3f3
                    }

                    .view-account .side-bar .user-info .img-profile {
                        width: 120px;
                        height: 120px;
                        margin-bottom: 15px
                    }

                    .view-account .side-bar .user-info .meta li {
                        margin-bottom: 10px
                    }

                    .view-account .side-bar .user-info .meta li span {
                        display: inline-block;
                        width: 100px;
                        margin-right: 5px;
                        text-align: right
                    }

                    .view-account .side-bar .user-info .meta li a {
                        color: #616670
                    }

                    .view-account .side-bar .user-info .meta li.activity {
                        color: #a2a6af
                    }

                    .view-account .side-bar .side-menu {
                        text-align: center
                    }

                    .view-account .side-bar .side-menu .nav {
                        display: inline-block;
                        margin: 0 auto
                    }

                    .view-account .side-bar .side-menu .nav>li {
                        font-size: 14px;
                        margin-bottom: 0;
                        border-bottom: none;
                        display: inline-block;
                        float: left;
                        margin-right: 15px;
                        margin-bottom: 15px
                    }

                    .view-account .side-bar .side-menu .nav>li:last-child {
                        margin-right: 0
                    }

                    .view-account .side-bar .side-menu .nav>li>a {
                        display: inline-block;
                        color: #9499a3;
                        padding: 5px;
                        border-bottom: 2px solid transparent
                    }

                    .view-account .side-bar .side-menu .nav>li>a:hover {
                        color: #616670;
                        background: none
                    }

                    .view-account .side-bar .side-menu .nav>li.active a {
                        color: #40babd;
                        border-bottom: 2px solid #40babd;
                        background: none;
                        border-right: none
                    }

                    .theme-2 .view-account .side-bar .side-menu .nav>li.active a {
                        color: #6dbd63;
                        border-bottom-color: #6dbd63
                    }

                    .theme-3 .view-account .side-bar .side-menu .nav>li.active a {
                        color: #497cb1;
                        border-bottom-color: #497cb1
                    }

                    .theme-4 .view-account .side-bar .side-menu .nav>li.active a {
                        color: #ec6952;
                        border-bottom-color: #ec6952
                    }

                    .view-account .side-bar .side-menu .nav>li .icon {
                        display: block;
                        font-size: 24px;
                        margin-bottom: 5px
                    }

                    .view-account .content-panel {
                        padding: 30px
                    }

                    .view-account .content-panel .title {
                        margin-bottom: 15px;
                        margin-top: 0;
                        font-size: 18px
                    }

                    .view-account .content-panel .fieldset-title {
                        padding-bottom: 15px;
                        border-bottom: 1px solid #eaeaf1;
                        margin-bottom: 30px;
                        color: #616670;
                        font-size: 16px
                    }

                    .view-account .content-panel .avatar .figure img {
                        float: right;
                        width: 64px
                    }

                    .view-account .content-panel .content-header-wrapper {
                        position: relative;
                        margin-bottom: 30px
                    }

                    .view-account .content-panel .content-header-wrapper .actions {
                        position: absolute;
                        right: 0;
                        top: 0
                    }

                    .view-account .content-panel .content-utilities {
                        position: relative;
                        margin-bottom: 30px
                    }

                    .view-account .content-panel .content-utilities .btn-group {
                        margin-right: 5px;
                        margin-bottom: 15px
                    }

                    .view-account .content-panel .content-utilities .fa {
                        font-size: 16px;
                        margin-right: 0
                    }

                    .view-account .content-panel .content-utilities .page-nav {
                        position: absolute;
                        right: 0;
                        top: 0
                    }

                    .view-account .content-panel .content-utilities .page-nav .btn-group {
                        margin-bottom: 0
                    }

                    .view-account .content-panel .content-utilities .page-nav .indicator {
                        color: #a2a6af;
                        margin-right: 5px;
                        display: inline-block
                    }

                    .view-account .content-panel .mails-wrapper .mail-item {
                        position: relative;
                        padding: 10px;
                        border-bottom: 1px solid #f3f3f3;
                        color: #616670;
                        overflow: hidden
                    }

                    .view-account .content-panel .mails-wrapper .mail-item>div {
                        float: left
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .icheck {
                        background-color: #fff
                    }

                    .view-account .content-panel .mails-wrapper .mail-item:hover {
                        background: #f9f9fb
                    }

                    .view-account .content-panel .mails-wrapper .mail-item:nth-child(even) {
                        background: #fcfcfd
                    }

                    .view-account .content-panel .mails-wrapper .mail-item:nth-child(even):hover {
                        background: #f9f9fb
                    }

                    .view-account .content-panel .mails-wrapper .mail-item a {
                        color: #616670
                    }

                    .view-account .content-panel .mails-wrapper .mail-item a:hover {
                        color: #494d55;
                        text-decoration: none
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .checkbox-container,
                    .view-account .content-panel .mails-wrapper .mail-item .star-container {
                        display: inline-block;
                        margin-right: 5px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .star-container .fa {
                        color: #a2a6af;
                        font-size: 16px;
                        vertical-align: middle
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .star-container .fa.fa-star {
                        color: #f2b542
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .star-container .fa:hover {
                        color: #868c97
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-to {
                        display: inline-block;
                        margin-right: 5px;
                        min-width: 120px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject {
                        display: inline-block;
                        margin-right: 5px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label {
                        margin-right: 5px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label:last-child {
                        margin-right: 10px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label a,
                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label a:hover {
                        color: #fff
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-1 {
                        background: #f77b6b
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-2 {
                        background: #58bbee
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-3 {
                        background: #f8a13f
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-4 {
                        background: #ea5395
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-5 {
                        background: #8a40a7
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .time-container {
                        display: inline-block;
                        position: absolute;
                        right: 10px;
                        top: 10px;
                        color: #a2a6af;
                        text-align: left
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .time-container .attachment-container {
                        display: inline-block;
                        color: #a2a6af;
                        margin-right: 5px
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .time-container .time {
                        display: inline-block;
                        text-align: right
                    }

                    .view-account .content-panel .mails-wrapper .mail-item .time-container .time.today {
                        font-weight: 700;
                        color: #494d55
                    }

                    .drive-wrapper {
                        padding: 15px;
                        background: #fff;
                        overflow: hidden
                    }

                    .drive-wrapper .drive-item {
                        width: 130px;
                        margin-right: 15px;
                        display: inline-block;
                        float: left
                    }

                    .drive-wrapper .drive-item:hover {
                        box-shadow: 0 1px 5px rgba(0, 0, 0, .1);
                        z-index: 1
                    }

                    .drive-wrapper .drive-item-inner {
                        padding: 15px
                    }

                    .drive-wrapper .drive-item-title {
                        margin-bottom: 15px;
                        max-width: 100px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis
                    }

                    .drive-wrapper .drive-item-title a {
                        color: #494d55
                    }

                    .drive-wrapper .drive-item-title a:hover {
                        color: #40babd
                    }

                    .theme-2 .drive-wrapper .drive-item-title a:hover {
                        color: #6dbd63
                    }

                    .theme-3 .drive-wrapper .drive-item-title a:hover {
                        color: #497cb1
                    }

                    .theme-4 .drive-wrapper .drive-item-title a:hover {
                        color: #ec6952
                    }

                    .drive-wrapper .drive-item-thumb {
                        width: 100px;
                        height: 80px;
                        margin: 0 auto;
                        color: #616670
                    }

                    .drive-wrapper .drive-item-thumb a {
                        -webkit-opacity: .8;
                        -moz-opacity: .8;
                        opacity: .8
                    }

                    .drive-wrapper .drive-item-thumb a:hover {
                        -webkit-opacity: 1;
                        -moz-opacity: 1;
                        opacity: 1
                    }

                    .drive-wrapper .drive-item-thumb .fa {
                        display: inline-block;
                        font-size: 36px;
                        margin: 0 auto;
                        margin-top: 20px
                    }

                    .drive-wrapper .drive-item-footer .utilities {
                        margin-bottom: 0
                    }

                    .drive-wrapper .drive-item-footer .utilities li:last-child {
                        padding-right: 0
                    }

                    .drive-list-view .name {
                        width: 60%
                    }

                    .drive-list-view .name.truncate {
                        max-width: 100px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis
                    }

                    .drive-list-view .type {
                        width: 15px
                    }

                    .drive-list-view .date,
                    .drive-list-view .size {
                        max-width: 60px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis
                    }

                    .drive-list-view a {
                        color: #494d55
                    }

                    .drive-list-view a:hover {
                        color: #40babd
                    }

                    .theme-2 .drive-list-view a:hover {
                        color: #6dbd63
                    }

                    .theme-3 .drive-list-view a:hover {
                        color: #497cb1
                    }

                    .theme-4 .drive-list-view a:hover {
                        color: #ec6952
                    }

                    .drive-list-view td.date,
                    .drive-list-view td.size {
                        color: #a2a6af
                    }

                    @media (max-width:767px) {
                        .view-account .content-panel .title {
                            text-align: center
                        }
                        .view-account .side-bar .user-info {
                            padding: 0
                        }
                        .view-account .side-bar .user-info .img-profile {
                            width: 60px;
                            height: 60px
                        }
                        .view-account .side-bar .user-info .meta li {
                            margin-bottom: 5px
                        }
                        .view-account .content-panel .content-header-wrapper .actions {
                            position: static;
                            margin-bottom: 30px
                        }
                        .view-account .content-panel {
                            padding: 0
                        }
                        .view-account .content-panel .content-utilities .page-nav {
                            position: static;
                            margin-bottom: 15px
                        }
                        .drive-wrapper .drive-item {
                            width: 100px;
                            margin-right: 5px;
                            float: none
                        }
                        .drive-wrapper .drive-item-thumb {
                            width: auto;
                            height: 54px
                        }
                        .drive-wrapper .drive-item-thumb .fa {
                            font-size: 24px;
                            padding-top: 0
                        }
                        .view-account .content-panel .avatar .figure img {
                            float: none;
                            margin-bottom: 15px
                        }
                        .view-account .file-uploader {
                            margin-bottom: 15px
                        }
                        .view-account .mail-subject {
                            max-width: 100px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis
                        }
                        .view-account .content-panel .mails-wrapper .mail-item .time-container {
                            position: static
                        }
                        .view-account .content-panel .mails-wrapper .mail-item .time-container .time {
                            width: auto;
                            text-align: left
                        }
                    }

                    @media (min-width:768px) {
                        .view-account .side-bar .user-info {
                            padding: 0;
                            padding-bottom: 15px
                        }
                        .view-account .mail-subject .subject {
                            max-width: 200px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis
                        }
                    }

                    @media (min-width:992px) {
                        .view-account .content-panel {
                            min-height: 800px;
                            border-left: 1px solid #f3f3f7;
                            margin-left: 200px
                        }
                        .view-account .mail-subject .subject {
                            max-width: 280px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis
                        }
                        .view-account .side-bar {
                            position: absolute;
                            width: 200px;
                            min-height: 600px
                        }
                        .view-account .side-bar .user-info {
                            margin-bottom: 0;
                            border-bottom: none;
                            padding: 30px
                        }
                        .view-account .side-bar .user-info .img-profile {
                            width: 120px;
                            height: 120px
                        }
                        .view-account .side-bar .side-menu {
                            text-align: left
                        }
                        .view-account .side-bar .side-menu .nav {
                            display: block
                        }
                        .view-account .side-bar .side-menu .nav>li {
                            display: block;
                            float: none;
                            font-size: 14px;
                            border-bottom: 1px solid #f3f3f7;
                            margin-right: 0;
                            margin-bottom: 0
                        }
                        .view-account .side-bar .side-menu .nav>li>a {
                            display: block;
                            color: #9499a3;
                            padding: 10px 15px;
                            padding-left: 30px
                        }
                        .view-account .side-bar .side-menu .nav>li>a:hover {
                            background: #f9f9fb
                        }
                        .view-account .side-bar .side-menu .nav>li.active a {
                            background: #f9f9fb;
                            border-right: 4px solid #40babd;
                            border-bottom: none
                        }
                        .theme-2 .view-account .side-bar .side-menu .nav>li.active a {
                            border-right-color: #6dbd63
                        }
                        .theme-3 .view-account .side-bar .side-menu .nav>li.active a {
                            border-right-color: #497cb1
                        }
                        .theme-4 .view-account .side-bar .side-menu .nav>li.active a {
                            border-right-color: #ec6952
                        }
                        .view-account .side-bar .side-menu .nav>li .icon {
                            font-size: 24px;
                            vertical-align: middle;
                            text-align: center;
                            width: 40px;
                            display: inline-block
                        }
                    }
                    .module {
                        border: 1px solid #f3f3f3;
                        border-bottom-width: 2px;
                        background: #fff;
                        margin-bottom: 30px;
                        position: relative;
                        border-radius: 4px;
                        background-clip: padding-box;
                    }
                    .module .module-footer {
                        background: #fff;
                        border-top: 1px solid #f3f3f7;
                        padding: 15px;
                    }
                    .module .module-footer a {
                        color: #9499a3;
                    }

                    #tag_result{
                    word-break: break-word;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    line-height: 16px; /* fallback */
                    max-height: 32px; /* fallback */
                    -webkit-line-clamp: 2; /* number of lines to show */
                    -webkit-box-orient: vertical;
                    }

                    .documents {
                        padding:20px;
                    }

                    .document {
                    float: left;
                    width: calc(33% - 20px);
                    max-width: 240px;
                    margin: 0px 10px 20px;
                    background-color: #fff;
                    border-radius: 3px;
                    border: 1px solid #dce2e9;
                    }

                    .document .document-body {
                    height: 130px;
                    text-align: center;
                    border-radius: 3px 3px 0 0;
                    background-color: #fdfdfe;
                    }

                    .document .document-body i {
                    font-size: 45px;
                    line-height: 120px;
                    }

                    .document .document-body img {
                    width: 100%;
                    height: 100%;
                    }

                    .document .document-footer {
                    border-top: 1px solid #ebf1f5;
                    height: 46px;;
                    padding: 5px 12px;
                    border-radius: 0 0 2px 2px;
                    }

                    .document .document-footer .document-name {
                    display: block;
                    margin-bottom: 0;
                    font-size: 15px;
                    font-weight: 600;
                    width: 100%;
                    line-height: normal;
                    overflow-x: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    }

                    .document .document-footer .document-description {
                    display: block;
                    margin-top: -1px;
                    font-size: 11px;
                    font-weight: 600;
                    color: #8998a6;
                    width: 100%;
                    line-height: normal;
                    overflow-x: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    }

                    .document.info .document-footer >*, .document.success .document-footer >*,
                    .document.danger .document-footer >*, .document.warning .document-footer >*,
                    .document.dark .document-footer >* {
                    color: #fff;
                    }

                    .document.info .document-footer {
                    background-color: #2da9e9;
                    }

                    .document.success .document-footer {
                    background-color: #0ec8a2;
                    }

                    .document.warning .document-footer {
                    background-color: #ff9e2a;
                    }

                    .document.danger .document-footer {
                    background-color: #f95858;
                    }

                    .document.dark .document-footer {
                    background-color: #314557;
                    }

                    .folders {
                    width: 100%;
                    }

                    .folders li {
                    font-size: 14px;
                    padding: 3px 4px 3px 12px;
                    }

                    .folders li a {
                    text-decoration: none;
                    color: #4a4d56;
                    }

                    .folders li a i {
                    color: #5e6168;
                    font-size: 16px;
                    margin-right: 5px;
                    }

                    @media screen and (max-width: 600px) {
                    .document  {
                        width: 100%;
                        margin: 5px 0;
                        max-width: none;
                    }
                    }


                    /* Drag and drop */

                    .dropzone {
                    border: 2px dashed #cfdbe2;
                    width: 100%;
                    height: auto;
                    text-align: center;
                    border-radius: 5px;
                    padding: 5%;
                    }

                    .dropzone-image {
                    display: block;
                    margin: 0 auto 5%;
                    width: 100%;
                    max-width: 190px;
                    height: auto;
                    opacity: 0.75;
                    }

                    .dropzone a.btn {
                    padding: 9px 28px 8px;
                    }

                    .dropzone-thin {
                    width: 100%;
                    }

                    .dropzone-thin .dropzone-image {
                    min-width: 35px;
                    width: 10%;
                    max-width: 80px;
                    display: inline-block;
                    margin: 0 10px 0 0;
                    }

                    .dropzone-thin .dz-message > span {
                    display: inline-block;
                    vertical-align: middle;
                    font-size: 15px;
                    font-weight: 600;
                    }

                    .dz-preview {
                    padding: 10px 0;
                    border-bottom: 1px solid #edf2f4;
                    }

                    .dz-preview:nth-child(2) {
                    margin-top: 30px;
                    }

                    .dz-preview:last-child {
                    border-bottom: none;
                    }

                    .dz-image {
                    display: inline-block;
                    }

                    .dz-image img {
                    width: 50px;
                    height: 50px;
                    border-radius: 5px;
                    }

                    .dz-details {
                    display: inline-block;
                    width: calc(100% - 60px);
                    text-align: left;
                    vertical-align: middle;
                    padding-left: 20px;
                    }

                    .dz-error-message {
                    display: none;
                    }

                    .dz-success-mark, .dz-error-mark {
                    display: none;
                    }

                    .dropzone:hover {
                    background-color: #fbfdff;
                    cursor: pointer;
                    }

                    .dropzone:hover .dropzone-image {
                    opacity: 1;
                    }

                    .document-body video {
                    width: 100%;
                    height: auto;
                    }

                    td video {
                    width: 20%;
                    height: auto;
                    }

                    .document-footer {
                        padding-top: 15px !important;
                    }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#producer-files").html('');

                jQuery('#view_div').hide();

                jQuery('#search_div').hide();

                jQuery('#presentation_tab').hide();

                jQuery("#search_producer").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $(".drive-item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });

                    $(".document").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });

                    $("table tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                jQuery('#line').on('change', function() {
                    $.getPresentation();
                });

                jQuery('#presentation_tab').on('click', function() {
                    $("#producer-files").html('');
                    jQuery('#partner_tab').show();
                    jQuery('#presentation_tab').hide();
                    $.getPresentation();
                });
            });

            $.extend({
                getPresentation: function (p) {
                var line = jQuery('#line').val();
                $("#producer-files").html('');
                jQuery.ajax({
                    url: '{{url('/')}}' + '/get-producer-presentation/', page: p,
                    dataType: "json",
                    type: "GET",
                    data: {'_token': '{{ csrf_token() }}', 'line': line, 'page': p},
                    success:function(response) {
                        jQuery('#search_div').show();
                        jQuery('#view_div').show();

                        if(response != null){
                            len = response.producers.data.length;
                        }

                        $('#pagination').html('');
                        $('#pagination').html(response.pagination);

                        $(".pagination li a").attr('href', '');

                            // tags = $.map(tags, function( value, index ) {
                            //     tag = value.name.split(', ');
                            //     return tag;
                            // });
                            if($("#listView").hasClass("active")) {



                                        var tr_str = '<table class="table table-image" style="background-color: white;">' +
                                            '<thead>' +
                                            '<tr>' +
                                                '<th scope="col"></th>' +
                                                '<th scope="col">Name</th>' +
                                                '<th scope="col">Tags</th>' +
                                                '</tr>' +
                                            '</thead>' +
                                            '<tbody id="tbodyLine">';

                                            '</tbody>' +
                                        '</table>';

                                        $("#producer-files").append(tr_str);

                                        for(var i=0; i<len; i++) {
                                            var id = response.producers.data[i].id;
                                            var entry_name = response.producers.data[i].entry_name;
                                            var date = moment(response.producers.data[i].created_at).format('MMMM/DD/YYYY');

                                            var tags = response.producers.data[i].tags.map(function(elem){
                                                return elem.name;
                                            }).join(", ");
                                            tr_strr = '<tr>' +
                                                '<td>' +
                                                '<input type="hidden" class="onboardingVal" value="'+id+'">' +
                                                '<a href="#" id="getFiles" class="getFiles" value="'+id+'"><i class="fa fa-folder text-primary"></i></a>' +
                                                '</td>' +
                                                '<td>' + date + '</td>' +
                                                '<td>'+ tags + '</td>' +
                                                '</tr>';

                                                $("#tbodyLine").append(tr_strr);
                                            }

                                        $("#producer-files").addClass("line");
                                        $("#producer-files").removeClass("presentation");

                            } else {
                                for(var i=0; i<len; i++){
                                var id = response.producers.data[i].id;
                                var entry_name = response.producers.data[i].entry_name;
                                var date = moment(response.producers.data[i].created_at).format('MMMM/DD/YYYY');

                                var tags = response.producers.data[i].tags.map(function(elem){
                                    return elem.name;
                                }).join(", ");

                                    var tr_str = '<div class="drive-item module text-center">' +
                                        '<div class="drive-item-inner module-inner">' +
                                            '<div class="drive-item-title"><a href="#">' + date + '</a></div>'+
                                            '<div class="drive-item-thumb">'+
                                                '<a href="#" id="getFiles" class="getFiles" value="'+id+'" type="button"><i class="fa fa-folder text-primary"></i></a>'+
                                            '</div>'+
                                            '<input type="hidden" class="onboardingVal" value="'+id+'">' +
                                        '</div>'+

                                        '<div class="drive-item-footer module-footer" id="tag_result">'+ tags + '</div>'+
                                    '</div>';


                                    $("#producer-files").append(tr_str);

                                    $("#producer-files").addClass("line");
                                    $("#producer-files").removeClass("presentation");

                                }

                            }


                            jQuery(".getFiles").click(function(){
                                $("#producer-files").html('');
                                id = $(this).attr('value');
                                $.getFiles(id);
                            });


                                $("#gridView").unbind().click(function(){
                                    if( $("#producer-files").hasClass("presentation")) {
                                        // $("#producer-files").html('');
                                        $("#gridView").addClass("active");
                                        $("#listView").removeClass("active");

                                        $.getFiles(id);
                                    }

                                    if( $("#producer-files").hasClass("line")) {
                                        $("#producer-files").html('');
                                        $("#gridView").addClass("active");
                                        $("#listView").removeClass("active");
                                        $.getPresentation();
                                    }
                                });

                                $("#listView").unbind().click(function(){
                                    if( $("#producer-files").hasClass("presentation")) {

                                        // $("#producer-files").html('');
                                        $("#listView").addClass("active");
                                        $("#gridView").removeClass("active");

                                        $.getFiles(id);
                                    }

                                    if( $("#producer-files").hasClass("line")) {
                                        $("#producer-files").html('');
                                        $("#listView").addClass("active");
                                        $("#gridView").removeClass("active");
                                        $.getPresentation();
                                    }

                                });

                                $(document).on('click', '.pagination li a', function(e){
                                    if( $("#producer-files").hasClass("presentation")) {
                                        e.preventDefault();
                                        var p = $(this).text();

                                        $.getFiles(id, p);
                                    }

                                    if( $("#producer-files").hasClass("line")) {
                                        e.preventDefault();
                                        var p = $(this).text();

                                        $.getPresentation(p);
                                    }
                                });

                        }

                    });
                }
            });

            $.extend({
                getFiles: function (id, p) {
                                $("#producer-files").html('');
                                jQuery('#pageTitle').hide();
                                jQuery('#partner_tab').hide();
                                jQuery('#presentation_tab').show();
                                jQuery.ajax({
                                    url: '{{url('/')}}' + '/get-producer-files/' + id, page: p,
                                    dataType: "json",
                                    type: "GET",
                                    data: {'_token': '{{ csrf_token() }}', 'id': id, page: p},
                                    success:function(response) {

                                        $("#producer-files").html('');
                                        if(response != null){
                                            len = response.files.data.length;
                                        }

                                        $('#pagination').html('');
                                        $('#pagination').html(response.paginationFiles);

                                        $(".pagination li a").attr('href', '');

                                        if($("#listView").hasClass("active")) {



                                            var tr_str = '<table class="table table-image" style="background-color: white;">' +
                                                    '<thead>' +
                                                    '<tr>' +
                                                        '<th scope="col"></th>' +
                                                        '<th scope="col">File</th>' +
                                                        '<th scope="col">Entry Name</th>' +
                                                        '</tr>' +
                                                    '</thead>' +
                                                    '<tbody id="tbodyPresentation">'+
                                                    '</tbody>' +
                                                '</table>';

                                                $("#producer-files").append(tr_str);

                                                $("#producer-files").addClass("presentation");
                                                $("#producer-files").removeClass("line");

                                                for(var i=0; i<len; i++){
                                                        var id = response.files.data[i].id;
                                                        var file = response.files.data[i].file;
                                                        var entry_name = response.files.data[i].entry_name;
                                                        var extension = file.substr( (file.lastIndexOf('.') +1) );
                                                        if(extension == 'mp4') {
                                                            file_extension = '<video src="{{url("/")}}/file/presentation/'+entry_name+'/'+file+'" type="video/mp4" autobuffer autoloop loop controls allowfullscreen controlsList="nodownload" width="25"></video>';
                                                        } else {
                                                            file_extension = '<a href="{{url("/")}}/file/presentation/'+entry_name+'/'+file+'"><i class="fa fa-file-powerpoint-o text-primary" style="font-size: xxx-large; margin-left: 50px;"></i></a>';
                                                        }
                                                        tr_strr = '<tr>' +
                                                        '<td>' +
                                                        file_extension +
                                                        '</td>' +
                                                        '<td>' + file + '</td>' +
                                                        '<td>' + entry_name + '</td>' +
                                                        '</tr>';

                                                        $("#tbodyPresentation").append(tr_strr);
                                                    }

                                            } else {
                                                for(var i=0; i<len; i++){
                                                var id = response.files.data[i].id;
                                                var file = response.files.data[i].file;
                                                var entry_name = response.files.data[i].entry_name;
                                                var extension = file.substr( (file.lastIndexOf('.') +1) );


                                                    if(extension === 'mp4') {
                                                    var tr_str = '<div class="document success">'+
                                                        '<div class="document-body">'+
                                                            '<video src="{{url("/")}}/file/presentation/'+entry_name+'/'+file+'" type="video/mp4" autobuffer autoloop loop controls allowfullscreen controlsList="nodownload"></video>'+
                                                        '</div>'+
                                                        '<div class="document-footer">'+
                                                            '<span class="document-name">'+file+'</span>'+
                                                    '</div>'
                                                    ' </div>';
                                                    } else {
                                                        var tr_str = '<div class="document success">'+
                                                            '<div class="document-body">'+
                                                            '<a href="{{url("/")}}/file/presentation/'+entry_name+'/'+file+'"><i class="fa fa-file-powerpoint-o text-warning""></i></a>'+
                                                            '</div>'+
                                                            '<div class="document-footer">'+
                                                                '<span class="document-name">'+file+'</span>'+
                                                        '</div>'
                                                    '</div>';
                                                    }
                                                    $("#producer-files").append(tr_str);

                                                    $("#producer-files").addClass("presentation");
                                                    $("#producer-files").removeClass("line");
                                                }
                                            }


                                    }
                                });
                }
            });

        </script>



@endsection