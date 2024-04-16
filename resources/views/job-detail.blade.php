@include('partials.header')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('jobs')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                
                                <div class="jobs_conetent">
                                    
                                    <a href="#">
                                        <h4>{{$job->title}}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{$job->location}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$job->nature}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                             <p>{{$job->description}}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <?php
                                $resp = explode(".", $job->resposability);
                                $number = count($resp)-1;
                               
                            ?>
                            
                            <ul>
                                @if($number > 1 )
                                    @for($i=0; $i<$number; $i++)
                                        
                                        <li>{{$resp[$i]}}.</li>
                                        
                                    @endfor
                                @else
                                    <p>{{$job->resposability}}</p>

                                @endif
                               
                            </ul>
                            
                            
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <?php
                                $quals = explode(".", $job->qualifications);
                                $number = count($quals)-1;
                            ?>
                            
                            <ul>
                                @if($number > 1 )
                                    @for($i=0; $i<$number; $i++)
                                        
                                        <li>{{$quals[$i]}}.</li>
                                        
                                    @endfor
                                @else
                                    <p>{{$job->qualifications}}</p>
                                @endif
                               
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>  
                            <p>{{$job->benefits}}</p>
                        </div>
                        <div class="border-bottom"></div>
                        <div class="row">
                            <div class="col-md-2 mb-3 mb-sm-3 mb-lg-0 mt-2">
                                <form action="{{route('set-job')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="save" value="{{$job->id}}">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                </form>
                            </div>
                            <div  class="col-md-2 mb-3 mb-sm-3 mb-lg-0 mt-2">
                                <form action="{{route('set-job')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="apply" value="{{$job->id}}">
                                    <input type="submit" value="Apply" class="btn btn-secondary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Published on: <span>{{$job->created_at->format('Y-m-d H:i')}}</span></li>
                                <li>Vacancy: <span>{{$job->vacancy}} Position</span></li>
                                <li>Salary: <span style="color:green" > <s style="color:red">{{$job->salary - 400}} $</s> - {{$job->salary}}$/M</span></li>
                                <li>Location: <span>{{$job->location}}, {{$job->company->location}}</span></li>
                                <li>Job Nature: <span> {{$job->nature}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Company Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>{{$job->company->name}}</span></li>
                                    <li>Locaion: <span>{{$job->company->location}}</span></li>
                                    <li>Webite: <span>{{$job->company->website}}</span></li>
                                </ul>   
                            </div>
                        </div>
                
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.Profilchanging')
@include('partials.footer')