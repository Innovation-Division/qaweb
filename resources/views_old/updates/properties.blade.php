@extends('layouts.app')

@section('content')
	<div class="top-container">
            <!-- config enabled always -->
           
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category29"><a href="{{ url('/updates') }}" title="">Updates</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category79"><strong>Properties For Sale</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Properties For Sale
                </h1>
            </div>
          
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Properties For Sale</h1>
                    </div>
                    <style type="text/css">
                        <!
                        -- .properties .prop-desc h2
                        {
                            color: #00539e;
                            font: 900 23px 'Muli';
                            margin: 10px 0;
                            word-break: break-word;
                            word-wrap: break-word;
                        }
                        .properties .prop-item
                        {
                            margin-top: 30px;
                        }
                        .properties .prop-desc
                        {
                            padding: 15px 10px;
                            min-height: 140px;
                        }
                        .properties a:hover
                        {
                            text-decoration: none;
                        }
                        .properties a p
                        {
                            color: #777;
                        }
                        .properties .prop-desc, .properties .prop-img
                        {
                            border: 1px solid #777;
                        }
                        -- ></style><br>
                    <div class="text-center">
                        
                        <div class="row properties">
                          <img src="{{url('/images/COCOGEN Properties for Sale.png')}}" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
