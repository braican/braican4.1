import React from 'react';
import { useStaticQuery, graphql } from 'gatsby';

import styles from './Projects.module.scss';

const Projects = () => {
  const {
    allWordpressBraicanProjects: projectQuery,
    wordpressBraicanFront: front,
  } = useStaticQuery(graphql`
    query ProjectsQuery {
      allWordpressBraicanProjects {
        edges {
          node {
            projects {
              link
              title
            }
          }
        }
      }
      wordpressBraicanFront {
        intro: project_intro
      }
    }
  `);

  const projectList = projectQuery.edges.slice(0, 1).pop();

  if (!projectList) {
    return null;
  }

  const { projects } = projectList.node;

  return (
    <section className={styles.projects}>
      {front && front.intro && (
        <div className={styles.intro} dangerouslySetInnerHTML={{ __html: front.intro }} />
      )}
      <ul>
        {projects.map(({ link, title }) => (
          <li className={styles.project} key={link}>
            <a href={link} target="_blank" rel="noopener noreferrer">
              {title}
            </a>
          </li>
        ))}
      </ul>
    </section>
  );
};

export default Projects;
