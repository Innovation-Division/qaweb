@extends('layouts.epartner')
@section('main-content')
<div class="row">
                    <div class="col-md-12">
                        <div class="box">
                             <div class="box-title">
                                <span class="box-title-icon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
                                Upload profile picture
                            </div>
                            <div class="box-content p-3">
                                <form class="form-horizontal form-default" method="post" action="{{route('profilepicsave')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                 <div class="avatar-wrapper">
                                    <img class="profile-pic" src="" />
                                    <div class="upload-button">
                                        <i class="upfa fa fa-cloud-upload" aria-hidden="true"></i>
                                    </div>
                                    <input id="filename" name="filename" class="file-upload" type="file" accept="image/*"/>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">Upload Image</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal -->
              
                       
                    </div>                               
                </div>   
@endsection