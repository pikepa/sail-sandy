<input id="datepicker"
     x-data
     x-ref="input"
     x-init="new Pikaday({ field: $refs.input, format: 'MM/DD/YYYY', minDate: new Date(),})"
     type="text"
     class="shadow-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md w-27rem"
 />