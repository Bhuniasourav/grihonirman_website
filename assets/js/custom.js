function truncateText(text, maxWords, className) {
    
    const words = text.split(/\s+/); // Split text by whitespace
    if (words.length > maxWords) {
        return words.slice(0, maxWords).join(' ') + '...'; // Join first maxWords words and add ellipsis
    }
    return text;
}

// alert(truncateText("Bashbhumi Green View Project is a premier residential development that offers a variety of plot sizes to cater to diverse needs and preferences", 10));