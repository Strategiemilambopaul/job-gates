@include('partials.header')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
              @include('Home.usersSettings')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">My Jobs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{route('post-job')}}" class="btn btn-primary">Post a Job</a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @forelse($jobs as $job )
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">{{$job->title}}</div>
                                            <div class="info1">{{$job->nature}} . {{$job->location}}</div>
                                        </td>
                                        <td>{{$job->created_at->format('Y, M d | H:i')}}</td>
                                        <td>130 Applications</td>
                                        <td>
                                            <div class="job-status text-capitalize">active</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('job-detail',['id'=>$job->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                    <li><a class="dropdown-item" href="{{route('post-job',['id'=>$job->id])}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                    <form action="{{route('job-delete')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="delete" value="{{$job->id}}">
                                                        <li><button type="submit" class="dropdown-item" onClick="alert('you want delete this jobs on your blog? ⛔')"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button></li>
                                                    
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <p> you don't have any jobs on your blog</p>
                                    @endforelse
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@include('partials.Profilchanging')
@include('partials.footer')