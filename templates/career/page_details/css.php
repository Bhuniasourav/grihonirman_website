<style>
.breadcumb-wrapper {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
   
    background-size: cover !important;
    background-position: center;
    background-repeat: no-repeat;

}

.service-area-2 {
    position: relative;
    padding: 60px 0;
    
}

.service-area-2 .container2 {
    display: flex;
    flex-direction: column;
    /* align-items: center; */
}

.feature {
    border: 2px solid #ddd;
    /* Adjust the border color as needed */
    background-color: #f8f8f8;
    /* Light gray background */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    /* Center text inside each feature */
    transition: transform 0.3s, box-shadow 0.3s;
    /* Smooth transition for hover effects */
}

.feature:hover {
    transform: scale(1.05);
    /* Slightly enlarge the div on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    /* Add box shadow on hover */
}

.feature h3 {
    margin-top: 20px;
    margin-bottom: 15px;
}

.feature-icon {
    margin-bottom: 15px;
    background-color: green;
    /* Green background for SVG */
    padding: 10px;
    /* Padding to ensure the SVG is clearly visible */
    border-radius: 50%;
    /* Optional: Make the icon circular */
}

#featured-3 {
    text-align: center;
}

#featured-3 .row {
    display: flex;
    justify-content: center;
}

#featured-3 .feature {
    max-width: 350px;
    margin: 10px;
    /* Adjust the margin as needed */
}

.service-area-2 .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.service-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
    height: 100%;
}

.service-card:hover {
    transform: translateY(-10px);
}

.service-card_icon {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.service-card_content {
    flex-grow: 1;
}

.service-card_title {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.service-card_text {
    flex-grow: 1;
}

#featured-3 {
    justify-content: center;
    align-items: center;
}

.link-btn {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    color: #4BAF47;
    font-weight: bold;
    transition: color 0.3s;
}

.link-btn:hover {
    color: #388E3C;
}


/* Form  */
.form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: #f8f8f8; /* Light gray background */
}

.title-area {
    text-align: center;
    margin-bottom: 30px;
}

.sub-title {
    display: block;
    font-size: 16px;
    color: black; /* Dark gray color */
    margin-bottom: 2px;
}

.sec-title {
    font-size: 60px;
    color: black; /* Dark gray color */
}

form.career-main {
    width: 100%;
    max-width: 1000px; 
    background: #0f172a
    ; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    color: #fff; 
}

.career-main .form-row {
    display: contents;
}

.career-main .career-main .form-group {
    padding: 10px;
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

.full-width {
    grid-column: span 2;
}

.career-main .form-group label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #fff; /* Ensure label text is white */
}


.career-main .form-group input,
.form-group select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #fff; /* White text in input fields */
    background-color: #555; /* Dark background for input fields */
}

.career-main .form-group input[type="file"] {
    padding: 3px;
}

.career-main .form-group button {
    width: 100%;
    padding: 10px;
    background-color: #28a745; /* Green background */
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.career-main .form-group button:hover {
    background-color: #218838; /* Darker green on hover */
}

@media (max-width: 600px) {
    form {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: span 1;
    }
}
</style>