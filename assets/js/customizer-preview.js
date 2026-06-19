(function ($) {
  // Primary Color
  wp.customize("my_theme_primary_color", function (value) {
    value.bind(function (newColor) {
      document.documentElement.style.setProperty("--primary-color", newColor);
    });
  });

  // Secondary Color
  wp.customize("my_theme_secondary_color", function (value) {
    value.bind(function (newColor) {
      document.documentElement.style.setProperty("--secondary-color", newColor);
    });
  });

  // Dark Color
  wp.customize("my_theme_dark_color", function (value) {
    value.bind(function (newColor) {
      document.documentElement.style.setProperty("--dark-color", newColor);
    });
  });

  // Header Background Color
  wp.customize("my_theme_header_bg", function (value) {
    value.bind(function (newColor) {
      $(".header").css("background-color", newColor);
    });
  });

  // Header Layout
  wp.customize("my_theme_header_layout", function (value) {
    value.bind(function (newval) {
      $(".selector-header")
        .removeClass("header-standard header-centered header-stacked")
        .addClass("header-" + newval);
    });
  });

  // Logo Text
  wp.customize("my_theme_logo_text", function (value) {
    value.bind(function (newval) {
      $(".selector-logo-text").text(newval);
    });
  });

  // Header Button Text
  wp.customize("my_theme_header_btn_text", function (value) {
    value.bind(function (newval) {
      $(".selector-header-btn").text(newval);
    });
  });

  // Hero Badge
  wp.customize("my_theme_hero_badge", function (value) {
    value.bind(function (newval) {
      $(".selector-hero-badge").text(newval);
    });
  });

  // Hero Title
  wp.customize("my_theme_hero_title", function (value) {
    value.bind(function (newval) {
      $(".selector-hero-title").html(newval);
    });
  });

  // Hero Subtitle
  wp.customize("my_theme_hero_subtitle", function (value) {
    value.bind(function (newval) {
      $(".selector-hero-subtitle").text(newval);
    });
  });

  // Hero Button 1 Text
  wp.customize("my_theme_hero_btn_text", function (value) {
    value.bind(function (newval) {
      $(".selector-hero-btn1").text(newval);
    });
  });

  // Hero Button 2 Text
  wp.customize("my_theme_hero_btn2_text", function (value) {
    value.bind(function (newval) {
      $(".selector-hero-btn2").text(newval);
    });
  });

  // Hero Stats
  for (let i = 1; i <= 3; i++) {
    wp.customize("my_theme_hero_stat" + i, function (value) {
      value.bind(function (newval) {
        let parts = newval.split(" ");
        if (parts.length >= 2) {
            let firstPart = parts.shift();
            let rest = parts.join(" ");
            $(".selector-hero-stat-" + i).html("<strong>" + firstPart + "</strong><br>" + rest);
        } else {
            $(".selector-hero-stat-" + i).text(newval);
        }
      });
    });
  }

  // About Tag
  wp.customize("my_theme_about_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-about-tag").text(newval);
    });
  });

  // About Title
  wp.customize("my_theme_about_title", function (value) {
    value.bind(function (newval) {
      $(".selector-about-title").text(newval);
    });
  });

  // About Description
  wp.customize("my_theme_about_desc", function (value) {
    value.bind(function (newval) {
      $(".selector-about-desc").html(newval);
    });
  });

  // About Features
  for (let i = 1; i <= 4; i++) {
    wp.customize("my_theme_about_feature" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-about-feature-" + i).text("✅ " + newval);
      });
    });
  }

  // About Button Text
  wp.customize("my_theme_about_btn_text", function (value) {
    value.bind(function (newval) {
      $(".selector-about-btn").text(newval);
    });
  });

  // Services Tag
  wp.customize("my_theme_services_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-services-tag").text(newval);
    });
  });

  // Services Title
  wp.customize("my_theme_services_title", function (value) {
    value.bind(function (newval) {
      $(".selector-services-title").text(newval);
    });
  });

  // Services Subtitle
  wp.customize("my_theme_services_subtitle", function (value) {
    value.bind(function (newval) {
      $(".selector-services-subtitle").text(newval);
    });
  });

  // Service Items (Only for fallback content)
  for (let i = 1; i <= 6; i++) {
    wp.customize("my_theme_service_" + i + "_icon", function (value) {
      value.bind(function (newval) {
        $(".selector-service-icon-" + i).text(newval);
      });
    });
    wp.customize("my_theme_service_" + i + "_title", function (value) {
      value.bind(function (newval) {
        $(".selector-service-title-" + i).text(newval);
      });
    });
    wp.customize("my_theme_service_" + i + "_desc", function (value) {
      value.bind(function (newval) {
        $(".selector-service-desc-" + i).html(newval);
      });
    });
  }

  // CTA Title
  wp.customize("my_theme_cta_title", function (value) {
    value.bind(function (newval) {
      $(".cta h2").text(newval);
    });
  });

  // CTA Description
  wp.customize("my_theme_cta_description", function (value) {
    value.bind(function (newval) {
      $(".cta p").text(newval);
    });
  });

  // CTA Button Text
  wp.customize("my_theme_cta_btn_text", function (value) {
    value.bind(function (newval) {
      $(".cta .btn-primary").text(newval);
    });
  });

  // Why Choose Us Tag
  wp.customize("my_theme_why_choose_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-why-tag").text(newval);
    });
  });

  // Why Choose Us Title
  wp.customize("my_theme_why_choose_title", function (value) {
    value.bind(function (newval) {
      $(".selector-why-title").text(newval);
    });
  });

  // Why Choose Us Items
  for (let i = 1; i <= 4; i++) {
    wp.customize("my_theme_why_choose_" + i + "_icon", function (value) {
      value.bind(function (newval) {
        $(".selector-why-icon-" + i).text(newval);
      });
    });
    wp.customize("my_theme_why_choose_" + i + "_title", function (value) {
      value.bind(function (newval) {
        $(".selector-why-title-" + i).text(newval);
      });
    });
    wp.customize("my_theme_why_choose_" + i + "_desc", function (value) {
      value.bind(function (newval) {
        $(".selector-why-desc-" + i).html(newval);
      });
    });
  }

  // FAQ Tag
  wp.customize("my_theme_faq_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-faq-tag").text(newval);
    });
  });

  // FAQ Title
  wp.customize("my_theme_faq_title", function (value) {
    value.bind(function (newval) {
      $(".selector-faq-title").text(newval);
    });
  });


  // Testimonials Tag
  wp.customize("my_theme_testimonials_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-t-tag").text(newval);
    });
  });

  // Testimonials Title
  wp.customize("my_theme_testimonials_title", function (value) {
    value.bind(function (newval) {
      $(".selector-t-title").text(newval);
    });
  });

  // Testimonials Items
  for (let i = 1; i <= 3; i++) {
    wp.customize("my_theme_testimonial_text" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-t-text" + i).html(newval);
      });
    });
    wp.customize("my_theme_testimonial_name" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-t-name" + i).text(newval);
      });
    });
    wp.customize("my_theme_testimonial_desc" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-t-desc" + i).text(newval);
      });
    });
  }

  // Team Tag
  wp.customize("my_theme_team_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-team-tag").text(newval);
    });
  });

  // Team Title
  wp.customize("my_theme_team_title", function (value) {
    value.bind(function (newval) {
      $(".selector-team-title").text(newval);
    });
  });

  // Team Items
  for (let i = 1; i <= 3; i++) {
    wp.customize("my_theme_team_name" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-team-name" + i).text(newval);
      });
    });
    wp.customize("my_theme_team_role" + i, function (value) {
      value.bind(function (newval) {
        $(".selector-team-role" + i).text(newval);
      });
    });
  }

  // Contact Title
  wp.customize("my_theme_contact_title", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-title").text(newval);
    });
  });

  // Contact Description
  wp.customize("my_theme_contact_desc", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-desc").text(newval);
    });
  });

  // Contact Phone
  wp.customize("my_theme_contact_phone", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-phone").html("📞 " + newval);
    });
  });

  // Contact Email
  wp.customize("my_theme_contact_email", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-email").html("✉️ " + newval);
    });
  });

  // Contact Address
  wp.customize("my_theme_contact_address", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-address").html("📍 " + newval);
    });
  });

  // About Page Hero Title
  wp.customize("my_theme_about_page_hero_title", function (value) {
    value.bind(function (newval) {
      $(".selector-about-page-hero-title").text(newval);
    });
  });

  // About Page Hero Subtitle
  wp.customize("my_theme_about_page_hero_subtitle", function (value) {
    value.bind(function (newval) {
      $(".selector-about-page-hero-subtitle").text(newval);
    });
  });

  // About Page Journey Title
  wp.customize("my_theme_about_page_journey_title", function (value) {
    value.bind(function (newval) {
      $(".selector-about-page-journey-title").text(newval);
    });
  });

  // About Page Journey Content
  wp.customize("my_theme_about_page_journey_content", function (value) {
    value.bind(function (newval) {
      $(".selector-about-page-journey-content").html(newval);
    });
  });

  // 404 Title
  wp.customize("my_theme_404_title", function (value) {
    value.bind(function (newval) {
      $(".selector-404-title").text(newval);
    });
  });

  // 404 Description
  wp.customize("my_theme_404_description", function (value) {
    value.bind(function (newval) {
      $(".selector-404-description").text(newval);
    });
  });

  // Portfolio Tag
  wp.customize("my_theme_portfolio_tag", function (value) {
    value.bind(function (newval) {
      $(".selector-portfolio-tag").text(newval);
    });
  });

  // Portfolio Title
  wp.customize("my_theme_portfolio_title", function (value) {
    value.bind(function (newval) {
      $(".selector-portfolio-title").text(newval);
    });
  });

  // Portfolio Subtitle
  wp.customize("my_theme_portfolio_subtitle", function (value) {
    value.bind(function (newval) {
      $(".selector-portfolio-subtitle").text(newval);
    });
  });

  // Contact Page Hero Title
  wp.customize("my_theme_contact_page_hero_title", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-page-hero-title").text(newval);
    });
  });

  // Contact Page Hero Subtitle
  wp.customize("my_theme_contact_page_hero_subtitle", function (value) {
    value.bind(function (newval) {
      $(".selector-contact-page-hero-subtitle").text(newval);
    });
  });

})(jQuery);
