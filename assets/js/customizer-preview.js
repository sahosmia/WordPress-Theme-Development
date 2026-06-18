// Hero Badge
wp.customize("my_theme_hero_badge", function (value) {
  value.bind(function (newval) {
    $(".hero-content .badge").text(newval);
  });
});

// Hero Title
wp.customize("my_theme_hero_title", function (value) {
  value.bind(function (newval) {
    $(".hero-content h1").html(newval);
  });
});

// Hero Subtitle
wp.customize("my_theme_hero_subtitle", function (value) {
  value.bind(function (newval) {
    $(".hero-subtitle").text(newval);
  });
});

// Instantly update the Primary Color variable
wp.customize("my_theme_primary_color", function (value) {
  value.bind(function (newColor) {
    document.documentElement.style.setProperty("--primary-color", newColor);
  });
});

// Instantly update the Secondary Color variable
wp.customize("my_theme_secondary_color", function (value) {
  value.bind(function (newColor) {
    document.documentElement.style.setProperty("--secondary-color", newColor);
  });
});

// Instantly update the Dark Color variable
wp.customize("my_theme_dark_color", function (value) {
  value.bind(function (newColor) {
    document.documentElement.style.setProperty("--dark-color", newColor);
  });
});


//======================================================================= FAQ section
wp.customize("my_theme_faq_tag", function (value) {
  value.bind(function (newText) {
    $(".selector-faq-tag").text(newText);
  });
});

// Real-time update for FAQ Core Title Heading
wp.customize("my_theme_faq_title", function (value) {
  value.bind(function (newText) {
    $(".selector-faq-title").text(newText);
  });
});

// Loop script bindings to instantly catch individual active questions and answers updates
for (let i = 1; i <= 4; i++) {
  wp.customize("my_theme_faq_q" + i, function (value) {
    value.bind(function (newText) {
      $(".selector-faq-q" + i).text(newText);
    });
  });

  wp.customize("my_theme_faq_a" + i, function (value) {
    value.bind(function (newHTML) {
      $(".selector-faq-a" + i).html(newHTML);
    });
  });
}


wp.customize( 'my_theme_testimonials_tag', function( value ) {
        value.bind( function( newText ) { $( '.selector-t-tag' ).text( newText ); } );
    } );

    wp.customize( 'my_theme_testimonials_title', function( value ) {
        value.bind( function( newText ) { $( '.selector-t-title' ).text( newText ); } );
    } );

    for ( let i = 1; i <= 3; i++ ) {
        wp.customize( 'my_theme_testimonial_text' + i, function( value ) {
            value.bind( function( newHTML ) { $( '.selector-t-text' + i ).html( newHTML ); } );
        } );
        wp.customize( 'my_theme_testimonial_name' + i, function( value ) {
            value.bind( function( newText ) { $( '.selector-t-name' + i ).text( newText ); } );
        } );
        wp.customize( 'my_theme_testimonial_desc' + i, function( value ) {
            value.bind( function( newText ) { $( '.selector-t-desc' + i ).text( newText ); } );
        } );
    }

    // --- Team Real-Time Updates ---
    wp.customize( 'my_theme_team_tag', function( value ) {
        value.bind( function( newText ) { $( '.selector-team-tag' ).text( newText ); } );
    } );

    wp.customize( 'my_theme_team_title', function( value ) {
        value.bind( function( newText ) { $( '.selector-team-title' ).text( newText ); } );
    } );

    for ( let i = 1; i <= 3; i++ ) {
        wp.customize( 'my_theme_team_name' + i, function( value ) {
            value.bind( function( newText ) { $( '.selector-team-name' + i ).text( newText ); } );
        } );
        wp.customize( 'my_theme_team_role' + i, function( value ) {
            value.bind( function( newText ) { $( '.selector-team-role' + i ).text( newText ); } );
        } );
    }
