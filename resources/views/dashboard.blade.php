<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form >
                        <div class="form-inline">
                            <input class="form-control mr-sm-2 w-75" type="url" name="url" placeholder="Enter the URL" required>
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">URL Shortener</button>
                            
                        </div>
                    </form>
                    <div class="mt-5">
                        <table class="table">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">shortLink</th>
                                <th scope="col">link</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
