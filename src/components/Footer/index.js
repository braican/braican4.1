import React from 'react';
import PropTypes from 'prop-types';

const Footer = ({ className }) => (
  <footer className={className}>
    <p>&copy; {new Date().getFullYear()} Nick Braica</p>
  </footer>
);

Footer.propTypes = {
  className: PropTypes.string,
};

export default Footer;
