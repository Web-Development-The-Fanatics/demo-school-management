<br>
    @if(count($students) > 0)
        
            @foreach($students as $index => $student)
                @php
                    $average = $student->getAverage($student->id);
                    $style   = $average > 50 ? 'green' : 'red';
                @endphp
                <div class="col-md-6">
                <div class="card">
                    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background: rgb(39, 49, 60);color: #fff !important;" >
                        <div class="container" >
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <a class="navbar-brand" href="{{ url('/Portal') }}">
                                    {{ $student->first_name }} {{ $student->last_name }} | {{$student->id_number}}
                                    </a>
                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            ... More Options <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="">
                                                {{ __('Subjects') }}
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault();JavaScriptManager.getReport({{$student->id}});">
                                                {{ __('Academic Report') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                {{ __('Attendance') }}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body">
                        {{ $student->getGrade($student->grade_id) }}<br>
                        SZL {{ $student->balance }}
                        <img src="/images/{{ $student->avatar }}" onclick="JavaScriptManager.getReport({{$student->id}});" width="100" height="100" style="float:right;margin-top:-30px;"/>
                        <hr>
                        <i class="fa fa-trophy" style="float:right;color:{{$style}}"> {{ round($average, 2) }} %</i>
                        {{ $student->email }} {{ $student->mobile }}
                    </div>
                </div>
                </div>
            @endforeach
            
    @else
        <p>no students yet</p>
    @endif
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Academic Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <iframe id="view" ></iframe> -->
                    <iframe id="view" src="" height="500px" width="100%" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    

