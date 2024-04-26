const listings = [
    {
        imageUrl: 'MainSub.jpg',
        type: 'Home',
        address: '123 Main St, Suburbia',
        price: 300000,
        bedrooms: 3,
        bathrooms: 2,
        area: '1500 sqft'
    },
    {
        imageUrl: 'MentDown.jpg',
        type: 'Apartment',
        address: '456 Elm St, Downtown',
        price: '$2000/month',
        bedrooms: 2,
        bathrooms: 1,
        area: '1000 sqft'
    },
    {
        imageUrl: 'ConDown.jpg',
        type: 'Condo',
        address: '25 Park pl, Downtown',
        price: 650000,
        bedrooms: 3,
        bathrooms: 2,
        area: '1500 sqft'
    },
    {
        imageUrl: 'CrestSub.jpg',
        type: 'Home',
        address: '222 Crest St, Suburbia',
        price: 420000,
        bedrooms: 3,
        bathrooms: 1,
        area: '1000 sqft'
    }

];


const messages = [
    {
        imageUrl: 'guy.jpg',
        user: 'Justin',
        subject: 'Inquiry into Home',
        text: 'Hi. Your listings are so amazing and one in particular really works with our budget it is your victorian style home the one for 420000 i would love a private tour please contact me directly at 4445556666'
    },

    {
        imageUrl: 'chick.jpg',
        user: 'Brittany',
        subject: 'Previous Listing',
        text: 'I\'m really interested in a previous home you had listed and am wondering did it sell or is it just off the market.'
    },

    {
        imageUrl: 'chick.jpg',
        user: 'Cindy',
        subject: 'Apartment Availability',
        text: 'How is the Lenox Ave apartment available?'
    },

    {
        imageUrl: 'guy.jpg',
        user: 'Kentavious',
        subject: 'Neighrborhood Info',
        text: 'Hi one of your listings is a beautiful property but i am not to familiar with the area is it safe?'
    }
]



// Function to create a card for each listing and append to the container
function createListingCard(listing) {
    const card = document.createElement('div');
    card.classList.add('listing-card');

    // Construct card content
    card.innerHTML = `
        <img src="${listing.imageUrl}" alt="${listing.title}" class="listing-image">
        <div class="listing-details">
            <h2>${listing.type}</h2>
            <p><strong>Address:</strong> ${listing.address}</p>
            <p><strong>Price:</strong> ${listing.price}</p>
            <p><strong>Bedrooms:</strong> ${listing.bedrooms}</p>
            <p><strong>Bathrooms:</strong> ${listing.bathrooms}</p>
            <p><strong>Area:</strong> ${listing.area}</p>
        </div>
    `;

    // Append card to the container
    document.getElementById('listingContainer').appendChild(card);
}

function AvgPriceofListing(listing) {
    let avgPrice = 0
    listing.price.forEach(listing => {
        avgPrice += listing.price(listing)
    })

}

function createMessagesCard(messages) {
    const message = document.createElement('div');
    message.classList.add('messages-temp');


    message.innerHTML = `
        <img src="${messages.imageUrl}" alt="${messages.user}"
        <div class="message-details">
            <h2>${messages.user}</h2>
            <p><strong>Subject:</strong> ${messages.subject}</p>
            <p><strong>Text:</strong> ${messages.text}</p>
        </div>
    `;

    document.getElementById('messages-card').appendChild(message);
}


// Loop through the listings array and create a card for each listing
listings.forEach(listing => {
    createListingCard(listing);
});


messages.forEach(message => {
    createMessagesCard(message);
});