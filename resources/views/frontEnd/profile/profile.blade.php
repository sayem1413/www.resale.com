@extends('frontEnd.master1')

@section('title')
{{Auth::user()->name}}
@endsection

@section('mainContent')

@if (count($userAddress) === 1 || count($userInfo) === 1)
<div class="container container-fluid" style="margin-top: 50px; margin-bottom: 200px; height: 600px;">
    <div class="row row-border">
        <div class="col-md-3">
            <div class="sidebar sidebar-nav">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search.">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/profile')}}"><i class="fa fa-home"></i> My Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/user-profile/edit/'.Auth::user()->id)}}"><i class="fa fa-edit"></i> Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-list"></span> Activity Comment & Favourites</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{url('/user/activity/'.Auth::user()->id)}}"><span class="fa fa-arrow-right"></span>Comment</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="fa fa-arrow-right"></span>Faviourites</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('/auctions-manage/user/'.Auth::user()->id)}}"><i class="fa fa-edit"></i> Manage Advertisements</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <hr/>
            @if(count($userInfo->profileImage) === 1)
            <div align="center"> <img alt="User Pic" src="{{asset($userInfo->profileImage)}}" height="200px" width="200px" alt="Profile Image" class="img-circle img-responsive"> </div>
            @else
            <div align="center"> <img alt="User Pic" src="{{asset('public/frontEnd/profile-thum/profile.png')}}" class="img-circle img-responsive"> </div>
            @endif
            <table class="table table-user-information table-hover table-striped" style="margin-top: 50px;">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td>{{$userInfo->dateOfBirth}}</td>
                    </tr>
                    <tr>
                        <td>Gender: </td>
                        <td>
                            @if($userInfo->gender === 0)
                            {{'Women'}}
                            @elseif($userInfo->gender === 1)
                            {{'Men'}}
                            @elseif($userInfo->gender === 2)
                            {{'Others'}}
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Home Address</td>
                        <td><p>@if(count($userUpazila) === 1)
                            {{$userUpazila->upazilaName}},
                            @else
                            <p></p>
                            @endif
                            @if(count($userDistrict) === 1)
                            {{$userDistrict->districtName}},
                            @else
                            <p></p>
                            @endif 
                            @if(count($userDivision) === 1)
                            {{$userDivision->divisionName}}
                            @else
                            <p></p>
                            @endif
                            </p>
                    </tr>
                    <tr>
                        <td>Delaing/Business Address</td>
                        <td>{{$userAddress->dealingAddress}}</td>
                    </tr>
                    <tr>
                        <td>GPS Location: </td>
                        <td>{{$userAddress->gpsLocation}}</td>
                    </tr>
                     <tr>
                        <td>User Category</td>
                        <td>
                        @if($userInfo->userCategory === 1)
                        {{'Professional Business Purpose'}}
                        @elseif($userInfo->userCategory === 0)
                        {{'Personal Business Purpose'}}
                        @else
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{$userInfo->phoneNumber}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="container container-fluid" style="margin-top: 50px; height: 600px;">
    <div class="row row-border">
        <div class="col-md-3">
            <div class="sidebar sidebar-nav">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search.">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('/profile')}}"><i class="fa fa-home"></i> My Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/user-profile/create/'.Auth::user()->id)}}"><i class="fa fa-edit"></i> Create Profile Info</a>
                                </li>
                                <li>
                                    <a href="#"><span class="fa fa-list"></span> Activity Comment & Favourites</a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{url('/user/activity/'.Auth::user()->id)}}"><span class="fa fa-arrow-right"></span>Comment</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="fa fa-arrow-right"></span>Faviourites</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('/auctions-manage/user/'.Auth::user()->id)}}"><i class="fa fa-edit"></i> Manage Advertisements</a>
                                </li>


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <hr/>
            <div align="center"> <img alt="User Pic" src="{{asset('public/frontEnd/profile-thum/profile.png')}}" class="img-circle img-responsive"> </div>
            
            <table class="table table-user-information"  style="margin-top: 50px;">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Gender: </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Home Address</td>
                        <td><p></p></td>
                    </tr>
                    <tr>
                        <td>Delaing/Business Address</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>GPS Location: </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection