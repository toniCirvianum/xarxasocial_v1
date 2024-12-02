<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-coolGray-100  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-20">
                        <div class='bg-coolGray-100 '>
                            <div class="p-3 px-6 min-h-48 flex justify-center items-center" style="cursor: auto;">
                                <!-- Card with the image -->
                                <custom-card3 class="w-full">
                                    <div class="rounded-md shadow-md w-full bg-coolGray-900 text-coolGray-100">
                                        <!-- Image suer and user + surname -->
                                        <div class="flex items-center justify-between p-3" style="cursor: auto;">
                                            <div class="flex items-center space-x-2" style="cursor: auto;">
                                                <img src="{{ asset('storage/' . ($image->user->image?? 'default.png')) }}"
                                                    alt="{{ $image->user->nick }}" class="object-cover object-center w-8 h-8 rounded-full shadow-sm bg-coolGray-500 border-coolGray-700" style="cursor: auto;">
                                                <div class="-space-y-1" style="cursor: auto;">
                                                    <h2 class="text-sm font-semibold leading-none" style="cursor: auto;">{{ $image->user->  nick}}</h2>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Imatge -->
                                        <img src="{{ asset('storage/'.$image->image_path)}}" alt="" class="object-cover object-center w-full h-full bg-coolGray-500" style="cursor: auto;">
                                        <!-- Image Footer    -->
                                        <div class="p-4" style="cursor: auto;">
                                            <div class="flex items-center justify-between" style="cursor: auto;">
                                                <div class="flex items-center space-x-3">
                                                    <!-- Likes -->
                                                    <button type="button" title="Like post" class="flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                                                            <path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="space-y-3" style="cursor: auto;">
                                                <p class="text-sm" style="cursor: auto;">
                                                    <span class="text-base font-light">{{ '@'.$image->user->nick}} | {{ $image->created_at}}</span>
                                                </p>
                                            </div>
                                            <!-- Comment title -->
                                            <div class="flex items-center justify-between p-3" style="cursor: auto;">
                                                <p class="text-sm" style="cursor: auto;">
                                                    <span class="text-xl font-semibold ">Comments ({{count($image->comments)}})</span>
                                                </p>
                                            </div>
                                            <!-- Image comments -->
                                            @foreach ($image->comments as $comment)
                                            <div class="space-y-1" style="cursor: auto;">
                                                <p class="text-sm px-3 py-2" style="cursor: auto;">
                                                    <span class="text-base font-light text-grey-100">{{ '@'.$comment->user->nick}} | {{ $comment->created_at->diffForHumans()}}</span>
                                                    <br>
                                                    <span class="text-base font-semibold"> {{ $comment->content}} 
                                                        @if ($comment->user_id==Auth::user()->id || $image->user_id==Auth::user()->id)
                                                        |<a href="{{ route('delete.comment',['id'=>$comment->id]) }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 fill-current" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path fill="#ed2602" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                            </svg>
                                                        </a>
                                                        @endif
                                                    </span>
                                                </p>
                                                <hr>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr class="py-2">
                                        <!-- Form to send comments to db -->
                                        <form action="{{ route('store.comment') }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{$image->id}}">
                                            <div class="space-y-2 px-5">
                                                <input type="text" name="comment" placeholder="Add a comment..." class="w-full py-0.5 bg-transparent border-none rounded text-sm pl-0 text-coolGray-100" style="cursor: auto;">
                                                <x-input-error class="mt-2" :messages="$errors->get('comment')" />

                                                <div class="flex items-center py-2 gap-4">
                                                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                                                    @if (session('status') === 'profile-updated')
                                                    <p
                                                        x-data="{ show: true }"
                                                        x-show="show"
                                                        x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                                    @endif
                                                </div>
                                            </div>


                                        </form>

                                    </div>
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