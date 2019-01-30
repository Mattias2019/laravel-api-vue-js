<template>
    <div class="container">
        <h2>
            <span>Doctors</span> 
            
        </h2>

        <form @submit.prevent="addDoctor">
            <div class="form-group">
                <input type="text" class="form-control mb-2" placeholder="Name" v-model="doctor.name">
                <input type="text" class="form-control mb-2" placeholder="Email" v-model="doctor.email">
                <input type="text" class="form-control mb-2" placeholder="phone" v-model="doctor.phone">
                <textarea class="form-control mb-2" v-model="doctor.note" placeholder="input content"></textarea>
                <button type="submit" class="btn btn-success mb-2">Add New Doctor</button>
            </div>
        </form>
        <div class="card card-body mb-2" v-for="doctor in doctors" v-bind:key="doctor.id">
            <h3>{{doctor.name}}</h3>
            <p>{{doctor.email}} &nbsp;&nbsp;&nbsp;{{doctor.phone}}</p>
            <p>{{doctor.note}}</p>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-primary" @click="editDoctor(doctor)"><i class="fa fa-edit">  Edit </i></button>
               
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
        
        <!-- add new doctor modal  -->
       
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
        },
        addDoctor(){
            if(this.edit === false){
                //add
                fetch('api/doctor',{
                        method: 'post',
                        body: JSON.stringify(this.doctor),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    
                })
                .then(res => res.json)
                .then(data =>{
                    this.doctor.name ='';
                    this.doctor.email = '';
                    this.doctor.phone = '';
                    this.doctor.note = '';
                    alert('Doctor Added');
                    this.fetchDoctors();

                })
            }else{
                //update
                fetch('api/doctor',{
                        method: 'put',
                        body: JSON.stringify(this.doctor),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    
                })
                .then(res => res.json)
                .then(data =>{
                    this.doctor.name ='';
                    this.doctor.email = '';
                    this.doctor.phone = '';
                    this.doctor.note = '';
                    alert('Doctor Update');
                    this.fetchDoctors();

                })
            }
        },
        editDoctor(doctor){
            this.edit = true;
            this.doctor.id = doctor.id;
            this.doctor.doctor_id = doctor.id;
            this.doctor.name = doctor.name;
            this.doctor.email = doctor.email;
            this.doctor.phone = doctor.phone;
            this.doctor.note = doctor.note;
        }
    }
}
</script>

<style>
    h2{
        font-family: cursive;
        font-size: 40px;
        margin-bottom: 2%;
    }
</style>