<div>

    <div class="mt-2 bg-white" wire:ignore>
        <div {{ $attributes }} x-data x-ref="quillEditor" x-init="
               quill = new Quill($refs.quillEditor, {theme: 'snow'});
               quill.on('text-change', function () {
                 @this.set('content', quill.root.innerHTML);
               });
             ">
            {!! $slot ?? '' !!}
        </div>
    </div>
</div>
