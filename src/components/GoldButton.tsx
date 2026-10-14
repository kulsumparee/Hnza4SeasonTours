import { Link } from 'react-router';

interface GoldButtonProps {
  children: React.ReactNode;
  href?: string;
  onClick?: () => void;
  type?: 'button' | 'submit';
  fullWidth?: boolean;
  className?: string;
}

export default function GoldButton({
  children,
  href,
  onClick,
  type = 'button',
  fullWidth = false,
  className = '',
}: GoldButtonProps) {
  const baseClasses = `
    inline-flex items-center justify-center
    bg-warm-gold text-white font-body font-medium text-[0.9375rem] tracking-[0.02em]
    p-3 md:px-9 py-3.5 rounded-full
    shadow-gold
    transition-all duration-300 ease-out
    hover:shadow-gold-hover hover:scale-[1.02] hover:brightness-110
    active:scale-[0.98]
    ${fullWidth ? 'w-full' : ''}
    ${className}
  `;

  if (href) {
    return (
      <Link to={href} className={baseClasses}>
        {children}
      </Link>
    );
  }

  return (
    <button type={type} onClick={onClick} className={baseClasses}>
      {children}
    </button>
  );
}
