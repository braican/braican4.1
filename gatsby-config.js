require('dotenv').config();

module.exports = {
  siteMetadata: {
    title: `Nick Braica builds things`,
    description: `Portland, OR based web developer.`,
    author: `Nick Braica <nick.braica@gmail.com>`,
  },
  plugins: [
    `gatsby-plugin-react-helmet`,
    {
      resolve: `gatsby-source-filesystem`,
      options: {
        name: `images`,
        path: `${__dirname}/src/images`,
      },
    },
    `gatsby-transformer-sharp`,
    `gatsby-plugin-sharp`,
    {
      resolve: 'gatsby-source-wordpress',
      options: {
        baseUrl: process.env.WORDPRESS_SOURCE_URL,
        protocol: `http`,
        hostingWPCOM: false,

        useACF: false,

        // DEBUG - set to true to debug gatsby running to get data from the endpoints.
        verboseOutput: false,

        includedRoutes: ['**/*/*/projects', '**/braican/v1/front'],
      },
    },
  ],
};
