<template>
    <div class="container">
        <h2>
            Doctors
        </h2>
      
        <div class="card card-body mb-2" v-for="doctor in doctors" v-bind:key="doctor.id">
            <h3>{{doctor.name}}</h3>
            <p>{{doctor.email}} &nbsp;&nbsp;&nbsp;{{doctor.phone}}</p>
            <p>{{doctor.note}}</p>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-danger" @click="deleteDoctor(doctor.id)"><i class="fa fa-trash">  Delete </i></button>
                </div>
            </div>
        </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]"
                 class="page-item"><a class="page-link" href="#" @click="fetchDoctors(pagination.prev_page_url)">Previous</a></li>
                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{pagination.current_page}}
                    of {{pagination.last_page}}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]"
                class="page-item"><a class="page-link" href="#"  @click="fetchDoctors(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data(){
        return{
            doctors: [],
            doctor:{
                id: '',
                name: '',
                email: '',
                phone: '',
                note: ''
            }, 
            article_id: '',
            pagination: {},
            edit: false 
        }
    },
    
    created(){
        this.fetchDoctors();
    },
    methods: {
        fetchDoctors(page_url){
            let vm = this;
            page_url = page_url || 'api/doctors'
            fetch(page_url)
            .then(res=>res.json())
            .then(res=>{
                this.doctors = res.data;
                vm.makePagination(res.meta, res.links);
                console.log(res.data);
            })
            .catch(err => console.log(err));
        },
        makePagination(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }
            this.pagination = pagination;
        },
        deleteDoctor(id){
            if(confirm('Are you Sure')){
                fetch(`api/doctor/${id}`,{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Doctor Removed');
                    this.fetchDoctors();
                })
                .catch(err => console.log(err));
            }
        }
    }
}
</script>

