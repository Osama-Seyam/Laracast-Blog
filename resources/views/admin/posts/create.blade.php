<x-layout>
    <x-setting heading="Publish a New Post">

        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf


            <x-form.input name="title"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.input type="file" name="thumbnail"></x-form.input>
            <x-form.textarea name="excerpt"></x-form.textarea>
            <x-form.textarea name="body"></x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-submit-button>Post</x-submit-button>
        </form>

    </x-setting>
</x-layout>
