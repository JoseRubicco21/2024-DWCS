# PHP-Project

# Design

## Web Design

The design of the webpage tries to be minimalistic, simple and clutter free.

### Colors

It uses the following colors to give an earth-like and eco-friendly look:

- foreground: `#52645`
- foreground-dark: `#3a4a40`
- accent: `#c1a16d`
- accent-dark: `#a7854e`
- background: `#d8ecdf`
- background-accent: `#90af9d`
- background-alt: `#dfceb9`
- text-color: `#000000`
- text-alt: `#f1f1f1`
- error: `#e48383`
- error-text: `#7a2c2c`

### Typography

The typograhies used are `Poppins` and `Merriweather` since both of them are very versatile and easy to read. 

### Iconography & Logo

The iconography of ***Lirica*** leverages from `font-awesome` for its icons and a custom ñlogo to represent the idea of eco-friendly books and a wordplay between the word ***Lirica*** and ***Lirio***, It depicts a Calla lily coming out from a book as if the books where its roots. 

## Wireframe & Navigation Schema

The proposed navigation schema is the following one:

## Directory Schema

The directory schema is the following:

```
.
├── assets
├── README.md
└── src
    ├── components
    │   ├── forms
    │   └── layout
    ├── data
    ├── lib
    ├── pages
    └── styles
```

- assets: Stores all the images used in the webpage.
- README.md : The documentation for the project.
- src: The main folder for the code.
- components: Every single component and reutilizable html structure.
  - forms: Every component related to forms.
  - layout: Every component related to layout.
- data: All the data stored as a way to persist things in a non-db environment.
- lib: All the extra libraries created and used along the codebase.
- pages: All the pages of the webpage.
- styles: All the css styles used in the webpage.

## File Schema

```
.
├── assets
│   ├── Ecobooks2.jpg
│   ├── Ecobooks.jpg
│   └── Lirica_Logo_Color.png
├── README.md
└── src
    ├── components
    │   ├── forms
    │   │   ├── bookform.php
    │   │   ├── directionform.php
    │   │   ├── login.php
    │   │   └── register.php
    │   ├── hero.php
    │   ├── layout
    │   │   ├── appshell.php
    │   │   ├── fonts.php
    │   │   ├── footer.php
    │   │   ├── header.php
    │   │   └── head.php
    │   └── receipt.php
    ├── data
    │   ├── db.php
    │   └── user_data.dat
    ├── lib
    │   ├── dynamicGenerators.php
    │   ├── sessionManager.php
    │   └── ValidatorsSanitization.php
    ├── pages
    │   ├── index.php
    │   ├── login.php
    │   ├── logout.php
    │   ├── order_book.php
    │   ├── order_directions.php
    │   ├── order_receipt.php
    │   └── register.php
    └── styles
        ├── fonts.css
        └── styles.css
```

## Extras 

### MVC-like architecture
The extra is on the underlying architecture used with the main goal being modularity, expandability. It might not seem much at first, but maintainability, structure and organization is a fundamental issue when it comes to developing, thus focusing on it at the start is of utter importance for the success of any application.

The current architecture mimics somewhat what an MVC architecture would be mixed in with some ideas of component based systems. In the current folder schema there are 3 main sections that can follow into the MVC architecture:

- Model : `data` folder.
- Controller : `components` folder , `lib` folder.
- View : `pages` folder, `styles` folder 
 
### Dynamic generation of components

Using the principles of encapsulation and loose coupling most of the components are built in two-steps and latter on are embedded on the webpages. This two step process is done by handling an unique general case and iterating over it *n* amount of times needed. One only needs to pass to the generators an array of data that will be handled by the controller. 

### Data persitance by serialization

When it comes to data persitance a database could have been chosen, yet for the scope of the project & current inexpertise with php is understandable that in such a time frame it was not chosen. 

Yet data persistance is still present with the use of Serialization. It's in simple terms a very archaic way of doing a database. Yet it is better than storing the data in the client local storage or an ephemeral place like cookies. The data is handled by the server and not the client, thus being just a bit more secure. Though it is important to note that ***it is not a good practice*** to store sensitive data. This was done on purpose considering the scope and time frame of the project.





