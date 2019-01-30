<template>
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div  class="m-b-md patient">
                <h2 class="title m-b-md patient-text">
                    PatientDrive
                </h2>
                <h3 class="patient-txt">
                    Patient Customer relationship management
                </h3>
            </div>
        </div>
    </div>
</template>

 <script>
    export default {}
</script>

<style scoped>
    .container{
        z-index: -1;
    }
    .patient{
        z-index:-1;
        margin-left:50%;
        background-image: url('/images/4.png');
        background-repeat: no-repeat;
        background-size:auto 100% ;
        height: 80vh;
    }
    .patient-text{
        color:darkslategrey;
        padding-top: 60%;
        margin-top: 40%;
    }
    .patient-txt{
        color: aqua;
    }
    .full-height {
        margin-left:15%;
        height: 70vh;
   
        background-image: url('/images/3.png');
        background-repeat: no-repeat;
        background-size:auto 100% ;

         
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
    }
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }
    .content {
        text-align: right;
    }
    .title {
        font-size: 60px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .m-b-md {
        /* margin-bottom: 30px; */
        color: #000000;
    }
    </style>
