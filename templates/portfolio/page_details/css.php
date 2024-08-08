<style>
   .project-card-img {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    overflow: hidden;
    background-size: contain !important;
}

.project-card-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain !important;
    background-size: contain !important; 
}


/* .row {
    display: flex;
    flex-wrap: wrap;
} */

.col-xl-6, .col-md-6 {
    width: 50%;
    padding: 0 15px; /* Adjust padding as needed */
    box-sizing: border-box;
}

@media (max-width: 768px) {
    .col-md-6 {
        width: 100%;
    }
}
</style>