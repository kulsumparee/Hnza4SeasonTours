interface SectionHeaderProps {
  overline: string;
  heading: string;
  subheading?: string;
  overlineColor?: string;
  headingColor?: string;
  subheadingColor?: string;
  className?: string;
}

export default function SectionHeader({
  overline,
  heading,
  subheading,
  overlineColor = 'text-emerald-green',
  headingColor = 'text-mountain',
  subheadingColor = 'text-stone-color',
  className = '',
}: SectionHeaderProps) {
  return (
    <div className={`text-center mb-12 lg:mb-16 ${className}`}>
      <p
        className={`font-body font-medium text-sm uppercase tracking-[0.1em] mb-4 ${overlineColor}`}
      >
        {overline}
      </p>
      <h2
        className={`font-display font-medium text-3xl md:text-4xl lg:text-[clamp(2rem,4vw,3.5rem)] leading-tight ${headingColor}`}
      >
        {heading}
      </h2>
      {subheading && (
        <p
          className={`font-body font-light text-lg md:text-xl mt-4 max-w-xl mx-auto leading-relaxed ${subheadingColor}`}
        >
          {subheading}
        </p>
      )}
    </div>
  );
}
