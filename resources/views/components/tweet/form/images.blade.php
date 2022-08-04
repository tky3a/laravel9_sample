 {{-- 画像追加されたら表示 --}}
 <div x-data="inputFormHandler()" class="my-2">
   <template x-for="(field, i) in fields" :key="i">
     <div class="my-2 flex w-full">
       <label :for="field.id" class="w-full cursor-pointer rounded-md border border-gray-300 bg-white p-2">
         <input type="file" accept="image/*" class="sr-only" :id="field.id" name="images[]"
           @change="fields[i].file = $event.target.files[0]">
         <span x-text="field.file ? field.file.name : '画像を選択'" class="text-gray-700"></span>
       </label>
       <button type="reset" @click="removeField(i)" class="p-2">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
           <path fill-rule="evenodd"
             d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
             clip-rule="evenodd" />
         </svg>
       </button>
     </div>
   </template>

   {{-- filedsが４以下の場合に表示 --}}
   <template x-if="fields.length < 4">
     <button type="button" @click="addField()"
       class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
         <path fill-rule="evenodd"
           d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
           clip-rule="evenodd" />
       </svg>
       <span>画像を追加</span>
     </button>
   </template>
 </div>

 <script>
   function inputFormHandler() {
     return {
       fields: [],
       addField() {
         const i = this.fields.length;
         this.fields.push({
           file: '',
           id: `input-image-${i}`
         })
       },
       removeField(index) {
         this.fields.splice(index, 1);
       }
     }
   }
 </script>
