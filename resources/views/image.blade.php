<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-grey-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-20">
                        <div calss='bg-gray-300'>
                            <div class="p-3 px-6 min-h-48 flex justify-center items-center" style="cursor: auto;">
                                
                                <div class="overflow-y-auto h-auto">
                                    <div class="flex flex-col gap-10">

                                        <custom-card3>
                                            <div class="rounded-md shadow-md sm:w-96 bg-coolGray-900 text-coolGray-100">
                                                <div class="flex items-center justify-between p-3" style="cursor: auto;">
                                                    <div class="flex items-center space-x-2" style="cursor: auto;">
                                                        <img src="{{ asset('storage/' . ($image->user->image?? 'default.png')) }}"
                                                            alt="{{ $image->user->nick }}" class="object-cover object-center w-8 h-8 rounded-full shadow-sm bg-coolGray-500 border-coolGray-700" style="cursor: auto;">
                                                        <div class="-space-y-1" style="cursor: auto;">
                                                            <h2 class="text-sm font-semibold leading-none" style="cursor: auto;">{{ $image->user-> name}} {{ $image->user->surname}}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Imatge -->
                                                <img src="{{ asset('storage/'.$image->image_path)}}" alt="" class="object-cover object-center w-full h-72 bg-coolGray-500" style="cursor: auto;">
                                                <div class="p-3" style="cursor: auto;">
                                                    <div class="flex items-center justify-between" style="cursor: auto;">
                                                        <div class="flex items-center space-x-3">
                                                            <!-- Likes -->
                                                            <button id="btnlike" type="button" title="Like post" class=" btn-like flex items-center justify-center">
                                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                                                                    <path fill="#f70202" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                                                </svg> -->
                                                                <i class="fa-solid fa-heart" style="color: #f50000;"></i>
                                                            </button>
    
                                                            <button id="btn-dislike" type="button" title="Like post" class="btn-dislike flex items-center justify-center">
                                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                                                                    <path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
                                                                </svg> -->
                                                                <i class="fa-regular fa-heart"></i>
                                                            </button>

                                                            </a>
                                                            <!-- Comments -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                                                                    <path d="M496,496H480a273.39,273.39,0,0,1-179.025-66.782l-16.827-14.584C274.814,415.542,265.376,416,256,416c-63.527,0-123.385-20.431-168.548-57.529C41.375,320.623,16,270.025,16,216S41.375,111.377,87.452,73.529C132.615,36.431,192.473,16,256,16S379.385,36.431,424.548,73.529C470.625,111.377,496,161.975,496,216a171.161,171.161,0,0,1-21.077,82.151,201.505,201.505,0,0,1-47.065,57.537,285.22,285.22,0,0,0,63.455,97L496,457.373ZM294.456,381.222l27.477,23.814a241.379,241.379,0,0,0,135,57.86,317.5,317.5,0,0,1-62.617-105.583v0l-4.395-12.463,9.209-7.068C440.963,305.678,464,262.429,464,216c0-92.636-93.309-168-208-168S48,123.364,48,216s93.309,168,208,168a259.114,259.114,0,0,0,31.4-1.913Z"></path>
                                                                </svg>
                                                            <span class="text-sm">{{ $image->comments->isNotEmpty() ? count($image->comments):''}}</span>
                                                        </div>
                                                    </div>
                                                    <!-- user image -->
                                                    <div class="space-y-3 py-3" style="cursor: auto;">
                                                        <p class="text-sm" style="cursor: auto;">
                                                            <span class="text-lg font-light text-grey-100">{{ '@'.$image->user->nick}} | {{ $image->created_at->diffForHumans() }}</span>
                                                        </p>
                                                        <p class="text-sm" style="cursor: auto;">
                                                            <span class="text-base font-semibold px-2">{{ $image->description}}</span>
                                                        </p>
                                                        @if ($image->comments->isNotEmpty())
                                                        <label class="w-full py-0.5 bg-transparent border-none rounded text-sm pl-0 text-coolGray-100" style="cursor: auto;">
                                                            {{'@'.$image->comments->first()->user->nick}} | {{$image->comments->first()->content}}
                                                        </label>
                                                        @endif
                                                    </div>
                                                    <!-- form to add comments -->
                                                     <form action="{{ route('store.comment') }}" action="post" >
                                                        @csrf 
                                                        <!-- @method('patch') -->
                                                        <input type="hidden" name='id' value="{{ $image->id}}">
                                                        <div class="space-y2 px-2">
                                                            <input type="text" name="content" placeholder="{{ __('Add a comment') }}">
                                                        </div> 
                                                        <div>
                                                            <x-primary-button> {{ __('Save')}}</x-primary-button>
                                                        </div>

                                                     </form>

                                                </div>
                                            </div>
                                        </custom-card3>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>





</x-app-layout>