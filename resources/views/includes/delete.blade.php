
                    <form action="{{ route('delete', $film['id_films']) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <button type="submit">
                            <i class="material-icons-outlined text-base">delete_outline</i>
                        </button>
                     </form>
                </div>


            </div>
        </div>
    </div>
</div>